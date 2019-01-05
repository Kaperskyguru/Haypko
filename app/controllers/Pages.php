<?php
/**
*
*/
class Pages extends Controller
{
    private $customer_id;
    private $order_id;

    public function __construct()
    {
        $this->customerModel = $this->model('index');
        $this->productModel = $this->model('Product');
        $this->notifModel = $this->model('notify');
        $this->partnerModel = $this->model('Partner');
        $this->addressModel = $this->model('Address');
    }

    public function verify()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            var_dump( $_POST['orderID']);
            $data = [
                'reference' => $_POST['response'],
                'customer_id' => $_POST['id'],
                'order_id' => $_POST['orderID'],
                'partner_id' => $_POST['partner_id'],
            ];

            $this->verifyTransaction($data);
        } else {
            $this->views('pages/index');
        }
    }

    private function showCart(array $data, int $id, $order_id)
    {
        $prices = 0;
        foreach($data['products'] as $product):?>
        <li>
            <span><?php echo $product['litre']?>L of <?php echo $product['name']?></span>
            <span class="summary-price">N<?php echo formatNumber($product['price'])?></span>
        </li>
        <?php
        $prices += $product['price'];
        endforeach ?>
    </ul>
    <input type="hidden" value="<?php echo $id ?>" id="customer_id"/>
    <input type="hidden" value="<?php echo $prices ?>" id="amount"/>
    <input type="hidden" value="<?php echo $data['district'] ?>" id="district"/>
    <input type="hidden" value="<?php echo $data['customer_email'] ?>" id="email"/>
    <input type="hidden" value="<?php echo $data['customer_phone']?>" id="Mobile_number"/>
    <input type="hidden" value="<?php echo $this->productModel->getOrderGroupById($order_id)?>" id="code"/>
    <div class="summ-total text-center">
        <span>Total:</span>
        <h1>N<?php
        echo formatNumber($prices);
        ?></h1>
    </div>
    <?php
}

public function save()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'reference' => trim($_POST['reference']),
            'customer_id' => trim($_POST['id']),

            'group_code' => $_POST['product'],
            'amount' => doubleval($_POST['amount'])/100,

            'partner_id' => trim($_POST['partner_id']),
            'tel_err' => '',
            'deliveryadd_err' => '',
            'price_err' => '',
            'litres_err' => '',
            'product_err' => '',
        ];
        $this->order_id = $this->customerModel->saveTransaction($data);
        if ($this->order_id > 0)
        {
            echo 'true/'.$this->order_id;
        } else {
            echo 'false';
        }
    } else {
        $this->views('pages/index');
    }
}

public function index()
{
    $partners = $this->partnerModel->getPartnersName();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitizing Input values
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $err_code = 0;
        $data = [
            'customer_email' => trim($_POST['email']),
            'customer_name' => trim($_POST['Name']),
            'customer_phone' => trim($_POST['Phone']),
            'customer_address' => trim($_POST['address']),
            'products' => $_POST['products'],
            'district' => $_POST['district'],
            'email_err' => '',
            'fullname_err' => '',
            'tel_err' => '',
            'deliveryadd_err' => '',
            'price_err' => '',
            'litres_err' => '',
            'product_err' => '',
            'partners' => $partners,
        ];

        // validate customer email
        if (empty($data['customer_email'])) {
            $data['email_err'] = 'This field is required.';
            $err_code = 1;
        }

        // validate customer name
        if (empty($data['customer_name'])) {
            $data['fullname_err'] = 'This field is required.';
            $err_code = 1;
        }

        // validate customer address
        if (empty($data['customer_address'])) {
            $data['deliveryadd_err'] = 'This field is required.';
            $err_code = 1;
        }

        // validate customer phone
        if (empty($data['customer_phone'])) {
            $data['tel_err'] = 'This field is required.';
            $err_code = 1;
        }
        // TODO:: Remove Product ID from table
        if ($err_code == 0) {
            $this->updateCustomerStat($this->productModel->getProductId($product['name']), date("Y-m-d H:i:s"), $data['customer_email'], $data['customer_phone']);
            if ($this->customer_id = $this->customerModel->storeCustomerDetails($data)) {
                if ($this->addressModel->createAddress($this->customer_id, $data['customer_address'])) {
                    if ($oid = $this->productModel->addProductGroup($data, $this->customer_id) ) {
                        $this->showCart($data, $this->customer_id, $oid);
                    }
                }
            }

        } else {
            $this->views('pages/index', $data);
        }
    } else {
        $data = [
            'price_err' => '',
            'litres_err' => '',
            'product_err' => '',
            'email_err' => '',
            'fullname_err' => '',
            'tel_err' => '',
            'deliveryadd_err' => '',
            'partners' => $partners,
        ];
        $this->views('pages/index', $data);
    }
}

private function verifyTransaction(array $verifyData)
{
    if (!$verifyData['reference']) {
        die('No reference supplied');
    }

    $paystack = new Yabacon\Paystack(SK);

    try {
        $tranx = $paystack->transaction->verify([
            'reference' => $verifyData['reference'],
        ]);
    } catch (\Yabacon\Paystack\Exception\ApiException $e) {
        print_r($e->getResponseObject());
        die($e->getMessage());
    }
    if ('success' === $tranx->data->status) {
        // verify transaction reference with DB reference and reference with user email addressor phone number
        $code = $tranx->data->metadata->custom_fields[1]->value;
        $phone = $tranx->data->metadata->custom_fields[0]->value;
        $totalAmountPaid = $tranx->data->amount/100;
        
        $data = [
            'ref_id' => trim($tranx->data->reference)
        ];
        
        $products = $this->productModel->getOrderGroupByGroupCode($code);
        $this->productModel->updateProductGroupRef($data, $code);
        $verifyRefData = [
            'cust_id' => $verifyData['customer_id'],
            'order_id' => $verifyData['order_id'],
        ];

        if( $this->verifyReferenceID($verifyRefData,  $tranx) ) {
            //TODO:: Verify prices here
            if ( $this->verifyAmountPaid($products, $totalAmountPaid) ) {
                foreach ($products as $product) {
                    $revenueData = [
                        'amount' => doubleval($product->product_amount),
                        'col' => $product->product_name,
                        'Month' => getMonth($product->date_added),
                        'Year' =>  getYear($product->date_added),
                        'Gas' => ($product->product_name == 'Gas')?doubleval($product->product_amount):0,
                        'Petrol' => ($product->product_name == 'Petrol')?doubleval($product->product_amount):0,
                        'Diesel' => ($product->product_name == 'Diesel')?doubleval($product->product_amount):0,
                        'partner_id' => $verifyData['partner_id'],
                    ];
                    
                    $this->customerModel->updateRevenue($revenueData);
                    $this->partnerModel->updateClientRevenue($revenueData);
                    $this->customerModel->updateProductSold($revenueData);
                    $this->partnerModel->updateClientProductSold($revenueData);
                }
                $notif = [
                    'partner_id' => $verifyData['partner_id'],
                    'content' => 'New order made',
                ];
                $this->sms($phone, $tranx->data->reference);
                $this->notifModel->add_notification($notif);

                //TODO:: Log here
                echo 'Your payment was Successfully recieved';
            } else {
                //TODO:: Log here
                echo 'Your payment was Successfully recieved, But not equal to the amount';
            }
        } else {
            // TODO:: Log here
            echo "Can not verify payment";
        }
    }
}

private function verifyReferenceID($data, $tranx)
{
    if (trim($this->customerModel->getReferenceId($data['cust_id'], $data['order_id'])) == trim($tranx->data->reference)) {
        return true;
    }
    return false;
}

private function updateCustomerStat($id,$time,$email,$phone)
{
    $data = [
        'product_id' => $id,
        'year' => getYear($time),
        'month' => getMonth($time),
        'email' => $email,
        'phone' => $phone,
    ];
    $this->customerModel->updateCustomerStat($data);
}

    private function sms(string $phone, string $ref)
    {

        $client = new infobip\api\client\SendSingleTextualSms(new infobip\api\configuration\BasicAuthConfiguration(USERNAME, PASSWORD));
        $requestBody = new infobip\api\model\sms\mt\send\textual\SMSTextualRequest();
        $requestBody->setFrom('Haypko');
        $requestBody->setTo([$phone]);
        $requestBody->setText("Thank you for using Haypko platform. Your Product code is : ".$ref);
        return $response = $client->execute($requestBody);
    }

    private function verifyAmountPaid(array $products, float $totalAmountPaid)
    {
        $totalAmount = 0;
        foreach($products as $product):
            $price = $this->productModel->getPrice($product->product_name);
            $total = $product->litres * $price;
            $totalAmount += $total;
        endforeach;
        if($totalAmount == $totalAmountPaid) {
            return true;
        }
        return false;
    }

    public function faq()
    {
        $this->views('pages/faq');
    }

    public function about()
    {
        $this->views('pages/about');
    }

    public function contact()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitizing Input values
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $valid = true;
            $errors = array();
            if (empty($_POST['fullname'])) {
                $valid = false;
                $errors['fullname'] = "You must enter your name.";
                // echo $errors['fullname'];
            }
            if (empty($_POST['email'])) {
                $valid = false;
                $errors['email'] = "You must enter your email address.";
            } elseif (!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
                $valid = false;
                $errors['email'] = "You must enter a valid email address.";
            }
            if (empty($_POST['message'])) {
                $valid = false;
                $errors['message'] = "You must enter a message.";
            }
        
            if($valid) {
                
                $data = [
                    'name' => trim($_POST['fullname']),
                    'from' => trim($_POST['email']),
                    'message' => trim($_POST['message']),
                    'title' => 'Contact Form Submission'
                ];
                
                if (contactMail($data)) {
                    flash('contact_message','Message sent successfully');
                } else {
                    flash('contact_message', "Message could not be sent");
                }
                $this->views('pages/contact');
            } else {
                // var_dump($errors);
                $this->views('pages/contact', $errors);
            }
        } else {
            $this->views('pages/contact');
        }
    }

    public function terms()
    {
        $this->views('pages/termsandconditions');
    }
}

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

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'reference' => trim($_POST['reference']),
                'customer_id' => trim($_POST['id']),

                'product' => trim($_POST['product']),
                'amount' => doubleval($_POST['amount'])/100,
                'litres' => trim($_POST['litres']),

                // 'product2' => trim($_POST['product2']),
                // 'amount2' => doubleval($_POST['amount2'])/100,
                // 'litres2' => trim($_POST['litres2']),
                //
                // 'product3' => trim($_POST['product3']),
                // 'amount3' => doubleval($_POST['amount3'])/100,
                // 'litres3' => trim($_POST['litres3']),

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
        $this->views('pages/contact');
    }

    public function terms()
    {
        $this->views('pages/termsandconditions');
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
                'email_err' => '',
                'fullname_err' => '',
                'tel_err' => '',
                'deliveryadd_err' => '',
                'price_err' => '',
                'litres_err' => '',
                'product_err' => '',
                'partners' => $partners,
            ];
            // $i = 0;
            // foreach($data['products'] as $product) {
            //     $i++;
            //     echo($product['name']);
            // }
            // die();
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
                        echo PK. 'ID:'.$this->customer_id;
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
            $verifyRefData = [
                'cust_id' => $verifyData['customer_id'],
                'order_id' => $verifyData['order_id'],
            ];
            if( $this->verifyReferenceID($verifyRefData,  $tranx) ) {
                print_r($this->sms($tranx->data->metadata->custom_fields[0]->value, trim($tranx->data->reference)));
                // Update Revenue
                $revenueData = [
                    'amount' => doubleval($tranx->data->amount)/100,
                    'col' => $tranx->data->metadata->custom_fields[1]->value,
                    'Month' => getMonth($tranx->data->paid_at),
                    'Year' =>  getYear($tranx->data->paid_at),
                    'Gas' => ($product_name == 'Gas')?doubleval($tranx->data->amount)/100:0,
                    'Petrol' => ($product_name == 'Petrol')?doubleval($tranx->data->amount)/100:0,
                    'Diesel' => ($product_name == 'Diesel')?doubleval($tranx->data->amount)/100:0,
                    'partner_id' => $verifyData['partner_id'],
                ];
                if ( $this->customerModel->updateRevenue($revenueData) && $this->partnerModel->updateClientRevenue($revenueData)) {
                    $productSoldData = [
                        'col' => $tranx->data->metadata->custom_fields[1]->value,
                        'month' => getMonth($tranx->data->paid_at),
                        'year' =>  getYear($tranx->data->paid_at),
                        'partner_id' => $verifyData['partner_id'],
                    ];
                    $this->customerModel->updateProductSold($productSoldData);
                    $this->partnerModel->updateClientProductSold($productSoldData);
                    $notif = [
                        'partner_id' => $verifyData['partner_id'],
                        'content' => 'New order made',
                    ];
                    $this->notifModel->add_notification($notif);
                    echo 'Your payment was Successfully recieved';
                } else {
                    //Log
                    echo 'Your payment was Successfully recieved, But was not updated';
                }

            } else {
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

    public function updateCustomerStat($id,$time,$email,$phone)
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

    public function sms(string $phone, string $ref)
    {

        $client = new infobip\api\client\SendSingleTextualSms(new infobip\api\configuration\BasicAuthConfiguration(USERNAME, PASSWORD));
        $requestBody = new infobip\api\model\sms\mt\send\textual\SMSTextualRequest();
        $requestBody->setFrom('Haypko');
        $requestBody->setTo([$phone]);
        $requestBody->setText("Thank you for using Haypko platform. Your Product code is : ".$ref);
        return $response = $client->execute($requestBody);
        // $this->views('api/v1/charts/smstest', $response);
    }
}

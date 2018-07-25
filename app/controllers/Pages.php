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
        }

        public function verify()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $response = $_POST['response'];
                $customer_id = $_POST['id'];
                $order_id = $_POST['orderID'];
                $this->verifyTransaction($customer_id, $order_id, $response);
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
                    'id' => trim($_POST['id']),
                    'product' => trim($_POST['product']),
                    'amount' => trim($_POST['amount']),
                    'litres' => trim($_POST['litres']),
                    'fullname_err' => '',
                    'tel_err' => '',
                    'deliveryadd_err' => '',
                    'price_err' => '',
                    'litres_err' => '',
                    'product_err' => '',
                ];
                $this->order_id = $this->customerModel->saveTransaction($data);
                if ($this->order_id > 0)
                {
                    echo 'true'.$this->order_id;
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

        public function index()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitizing Input values
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $err_code = 0;
                $data = [
                    'customer_email' => trim($_POST['email']),
                    'customer_name' => trim($_POST['Name']),
                    'customer_phone' => trim($_POST['Phone']),
                    'customer_address' => trim($_POST['address']),
                    'email_err' => '',
                    'fullname_err' => '',
                    'tel_err' => '',
                    'deliveryadd_err' => '',
                    'price_err' => '',
                    'litres_err' => '',
                    'product_err' => '',
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
                // var_dump($data);
                if ($err_code == 0) {

                    if ($this->customer_id = $this->customerModel->storeCustomerDetails($data)) {
                        echo PK. 'ID:'.$this->customer_id;
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
                ];
                $this->views('pages/index', $data);
            }
        }


    public function verifyTransaction($customer_id, $order_id, $reference)
    {
        if (!$reference) {
            die('No reference supplied');
        }

        $paystack = new Yabacon\Paystack(SK);

        try {
            $tranx = $paystack->transaction->verify([
                'reference' => $reference,
            ]);
        } catch (\Yabacon\Paystack\Exception\ApiException $e) {
            print_r($e->getResponseObject());
            die($e->getMessage());
        }

        if ('success' === $tranx->data->status) {
            // verify transaction reference with DB reference and reference with user email addressor phone number
            if ($this->customerModel->getReferenceId($customer_id, $order_id) == $tranx->data->reference) {
                echo 'Your payment was Successfully recieved';
            } else {
                echo "Payment error";
            }

        }
    }
}

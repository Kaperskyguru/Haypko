<?php
// define('USERNAME', 'Owumi2244');
// define('PASSWORD', 'Dtdcchub1');
//TODO Change the endpoints to unique characters
class Api extends Controller
{
    private $historyModel;
    function __construct()
    {
        $this->indexModel = $this->model('index');
        $this->productModel = $this->model('Product');
        $this->partnerModel = $this->model('Partner');
        $this->revenueModel = $this->model('Revenue');
        $this->historyModel = $this->model('History');
        $this->driverModel = $this->model('Driver');
    }

    public function index()
    {
        $data = [];
        // $this->views('api/chart', $data);
    }

    public function partners()
    {
        $partner = $this->partnerModel->getPartners();
        $this->views('api/v1/charts/partners', $partner);
    }

    // public function products($id)
    // {
    //     $productSoldData = $this->productModel->getClientProductSold($id);
    //     $this->views('api/v1/charts/clientdata', $productSoldData);
    // }

    // public function clientRevenue($id)
    // {
    //     $revenue1 = $this->partnerModel->getClientRevenues($id);
    //     $this->views('api/v1/charts/clientrevenue', $revenue1);
    // }

    public function orders(int $id)
    {
        $orders = $this->historyModel->getAllHistoryDetails($id);
        if ($orders != null) {
            $response['error'] = false;
            $response['message'] = 'Orders Retrieved';
            $response['orders'] = $orders;
        }else{
            $response['error'] = false;
            $response['message'] = 'No order found';
            $response['orders'] = $orders;

        }
        $this->views('api/v1/mobile/orders', $response);
    }

    public function prices()
    {
        $prices = $this->productModel->getPrices();
        $this->views('api/v1/charts/prices', $prices);
    }

    public function sms()
    {

        $client = new infobip\api\client\SendSingleTextualSms(new infobip\api\configuration\BasicAuthConfiguration(USERNAME, PASSWORD));
        $requestBody = new infobip\api\model\sms\mt\send\textual\SMSTextualRequest();
        $requestBody->setFrom('Solomon');
        $requestBody->setTo(['2348145655380', '2349052477213']);
        $requestBody->setText("Thank you very much for using Haypko platform. Your Product code is : 29384923h239fHh.");
        $response = $client->execute($requestBody);
        $this->views('api/v1/charts/smstest', $response);
    }

    public function login()
    {
        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
            $data = [
                'username' => trim($_POST[ 'username' ]),
                'password' => trim($_POST[ 'password' ]),
                'password_err' => '',
                'type_err' => '',
                'username_err' => '',
            ];
            $err_code = 0;

            // validate Password
            if (  empty(  $data[ 'password' ]  )  ) {
                $data[ 'password_err' ] = 'Please enter a password';
                $err_code = 1;
            }

            // validate username
            if (  empty(  $data[ 'username']  )  ) {
                $data[ 'username_err' ] = 'Please enter username';
                $err_code = 1;
            }

            if (  $err_code == 0  ) {
                $id = $this->driverModel->driverLogin(  $data  );
                if ($id) {
                    // user is not found with the credentials
                    $response["error"] = false;
                    $response["message"] = "Login successfull";
                    $response['partner_id'] = $this->driverModel->getDriver($id)->partner_id;
                    $response['driver_id'] = $id;
                    echo json_encode($response);
                } else {
                    // user is not found with the credentials
                    $response["error"] = true;
                    $response["message"] = "Something wrong. Please try again!";
                    echo json_encode($response);
                }
            } else {
                // user is not found with the credentials
                $response["error"] = true;
                $response["mesasge"] = "Login credentials are wrong. Please try again!";
                echo json_encode($response);
            }
        } else {
            redirector('');
        }
    }

    public function orderstatus()
    {
        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
            $data = [
                'order_status' => trim($_POST[ 'status_id' ]),
            ];
            if ($this->historyModel->updateOrder($_POST['order_id'], $data)){//} && $this->historyModel->updateBulkOrder($_POST['code'], $data)) {
                $response["error"] = false;
                $response["message"] = "Order delivered successfully";
                echo json_encode($response);
            } else {
                $response["error"] = true;
                $response["message"] = "Something went wrong, try again";
                echo json_encode($response);
            }
        } else {
            redirector('');
        }
    }
}

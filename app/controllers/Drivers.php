<?php
/**
*
*/
class Drivers extends Controller
{
    private $driverModel;
    function __construct()
    {
        $this->driverModel = $this->model( 'Driver' );
    }

    public function index()
    {   // Caching here
        if (isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] === USER_TYPE) {
            $history = $this->historyModel->getHistoriesByUserId($_SESSION['user_id']);
            $recentHistory = $this->historyModel->getRecentHistoriesByUserId($_SESSION['user_id']);
            $notif = $this->notifModel->get_notifications_by_user_id($_SESSION['user_id']);
            $totalProductSold = $this->productModel->get_total_Product_sold($_SESSION['user_id']);
            $totalRevenue = $this->revenueModel->getPartnerTotalRevenues($_SESSION['user_id']);
            $totalRevenueByMonth = $this->revenueModel->getPartnerTotalRevenuesByMonth(getMonth(TODAY), $_SESSION['user_id']);

            $data = [
                'recentHistory' => $recentHistory,
                'history' => $history,
                'notif' => $notif,
                'totalRevenue' => $totalRevenue,
                'totalProductSold' => $totalProductSold,
                'totalRevenueByMonth' => $totalRevenueByMonth
            ];

            $this->views('partner/partner', $data);
        } else {
            redirector( 'users/login');
        }
    }

    public function add() {
        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
            $password = generateRandomPassword();
            $data = [
                'name' => $_POST['name'],
                'username' => $_POST['username'],
                'password' => generateHashes($password),
                'location' => $_POST['address'],
                'email' => $_POST['email'],
                'mobile' => $_POST['phone']
            ];
            $create = $this->driverModel->createDriver($data);
            if($create != false) {
                $data = [
                    'password'=> $password,
                    'username'=> $data['username'],
                    'email'=> $data['email']
                ];
                if(mailer($data)) {
                    echo "Driver Created/".$create;
                } else {
                    echo "We could not send mail";
                }
            } else {
                echo "Driver Not Created";
            }
        } else {
            redirector('');
        }
    }

    private function storeGeneratedPassword($password, $id)
    {
        $data = [
            'password' => generateHashes($password),
        ];
        if ($this->driverModel->updateDriver($id, $data)) {
            return true;
        }
        return false;
    }

    public function updatePass()
    {
        if ("POST" == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
            $data = [
                'password' => generateHashes($_POST['npassword']),
            ];
            if ($this->driverModel->getDriverPassword($id) == $_POST['password']) {
                if ($this->driverModel->updateDriver($_POST['uid'], $data)) {
                    echo "password updated successfully";
                } else {
                    echo "An error occured";
                }
            } else {
                echo "Current password not match";
            }

        }  else {
            redirector('');
        }

    }

    public function delete($id = 0) {
        if ("POST" == $_SERVER['REQUEST_METHOD']) {
            if ($id != 0) {
                $delete = $this->driverModel->deleteDriver($id);
            } else {
                $delete = $this->driverModel->deleteDrivers($_POST['emp_id']);
            }
            if(!$delete) {
                echo "Partner Not Deleted";
            } else {
                echo "Partner Deleted";
            }
        } else {
            redirector('');
        }
    }
}

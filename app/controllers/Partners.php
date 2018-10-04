<?php
/**
*
*/
class Partners extends Controller
{
    private $partnerModel;
    function __construct()
    {
        $this->partnerModel = $this->model( 'Partner' );
        $this->historyModel = $this->model('History');
        $this->notifModel = $this->model('notify');
        $this->indexModel = $this->model('index');
        $this->revenueModel = $this->model('Revenue');
        $this->productModel = $this->model('Product');
        $this->addressModel = $this->model('Address');

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
                'partner_name' => $_POST['name'],
                'username' => $this->partnerModel->generateUsername($_POST['name']),
                'password' => generateHashes($password),
                'partner_location' => $_POST['address'],
                'partner_state' => $_POST['state'],
                'partner_city' => $_POST['city'],
                'partner_email' => $_POST['email'],
                'partner_mobile' => $_POST['phone'],
                'partner_rc_number' => $_POST['rcnum'],
                'partner_account_number' => $_POST['accnum'],
                'partner_account_name' => $_POST['accname'],
                'partner_bank_name' => $_POST['bankname'],
            ];
            $create = $this->partnerModel->createPartner($data);
            if($create != false) {
                $data = [
                    'password'=> $password,
                    'username'=> $data['username'],
                    'email'=> $data['partner_email']
                ];
                if($create) {
                    echo "Partner Created/".$create;
                } else {
                    echo "We could not send mail";
                }
            } else {
                echo "Partner Not Created";
            }
        } else {
            redirector('');
        }
    }

    public function viewPartner() {
        if ("POST" == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
            $partner = $this->partnerModel->getPartner($_POST['id']);
            echo "
            <p>Name</p>
            <h4>$partner->partner_name</h4>
            <p>RC Number</p>
            <h4>$partner->partner_rc_number</h4>
            <p>Location</p>
            <h4>$partner->partner_location</h4>
            <p>Phone Number</p>
            <h4>$partner->partner_mobile</h4>
            <p>Bank Details</p>
            <h4>$partner->partner_account_number</h4>
            <p>$partner->partner_bank_name</p>
            ";
        } else {
            redirector('');
        }
    }

    public function viewOrder() {
        if ("POST" == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
            $order = $this->historyModel->getOrder($_POST['id']);
            ?>
            <p>Product</p>
            <h4><?php echo $order->product_name ?></h4>
            <p>Quantity</p>
            <h4><?php echo $order->order_litres ?> Litres</h4>
            <p>Address</p>
            <h4><?php echo $this->addressModel->getAddressByCustomerId($order->order_customer_id) ?></h4>
            <p>Price</p>
            <h4><?php echo $order->order_amount ?></h4>
            <p>Trasaction ID</p>
            <h4><?php echo $order->order_reference_id ?></h4>
            <p>Status</p>
            <p> <?php echo ($order->order_status ==0) ? 'Pending':'Delivered'?></p>
            <?php ;
        } else {
            redirector('');
        }
    }

    // public function sendDetails()
    // {
    //     if ("POST" == $_SERVER['REQUEST_METHOD']) {
    //         $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
    //         $data = [
    //             'password'=> $_POST['p'],
    //             'username'=> $_POST['u'],
    //             'email'=> $_POST['email']
    //         ];
    //         if(mailer($data)) {
    //             echo "Email Sent successfully";
    //         } else {
    //             echo "We could not send mail";
    //         }
    //     } else {
    //         redirector('');
    //     }
    // }

    public function showDetails() {
        if ("POST" == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
            $password = generateRandomPassword();
            if ($this->storeGeneratedPassword($password, $_POST['id'])) {
                $partner = $this->partnerModel->getPartner($_POST['id']);
                $url = SITEURL;
                echo "
                <p>Username</p>
                <h3>$partner->username</h3>
                <p>Password</p>
                <h3>$password</h3>
                <form action='' method='post'>
                <input type='hidden' value='$partner->username' name='u' />
                <input type='hidden' value='$password' name='p' />
                <button type='button' class='btn btn-primary cancel'>Close </button>
                </form>
                ";
            } else {
                echo "
                <p>Something happened, try again</p>
                ";
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
        if ($this->partnerModel->updatePartner($id, $data)) {
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
            if ($this->partnerModel->getPartnerPassword($id) == $_POST['password']) {
                if ($this->partnerModel->updatePartner($_POST['uid'], $data)) {
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


    public function updateAccount() {
        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
            $data = [
                'partner_account_number' => $_POST['accnum'],
                'partner_account_name' => $_POST['accname'],
                'partner_bank_name' => $_POST['bankname'],
            ];
            $update = $this->partnerModel->updatePartner($_POST['uid'], $data);
            if($update) {
                echo "Partner Account Updated";
            } else {
                echo "Partner Account Failed to Update";
            }
        }  else {
            redirector('');
        }
    }

    public function delete($id = 0) {
        if ("POST" == $_SERVER['REQUEST_METHOD']) {
            if ($id != 0) {
                $delete = $this->partnerModel->deletePartner($id);
            } else {
                $delete = $this->partnerModel->deletePartners($_POST['emp_id']);
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

    public function delivered($id)
    {
        if ("POST" == $_SERVER['REQUEST_METHOD']) {
            $data = [
                'order_status' => 1
            ];
            $update = $this->historyModel->updateOrder($id, $data);
            if($update) {
                echo "Delivered";
            } else {
                echo "Error occured";
            }
        } else {
            redirector('');
        }
    }

}

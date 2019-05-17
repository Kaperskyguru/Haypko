<?php
/**
 *
 */
class Partners extends Controller
{
    private $partnerModel;
    public function __construct()
    {
        $this->partnerModel = $this->model('Partner');
        $this->historyModel = $this->model('History');
        $this->notifModel = $this->model('notify');
        $this->indexModel = $this->model('index');
        $this->revenueModel = $this->model('Revenue');
        $this->productModel = $this->model('Product');
        $this->addressModel = $this->model('Address');
        $this->driverModel = $this->model('Driver');

    }

    public function index()
    { // Caching here
        $user_id = $_SESSION['user_id'];
        $user_type = $_SESSION['user_type'];

        if (isset($user_id) && isset($user_type) && $user_type === USER_TYPE) {
            $history = $this->historyModel->getHistoriesByUserId($user_id);
            $recentHistory = $this->historyModel->getRecentHistoriesByUserId($user_id);
            $notif = $this->notifModel->get_notifications_by_user_id($user_id);
            $totalProductSold = $this->productModel->get_total_Product_sold($user_id);
            $totalRevenue = $this->revenueModel->getPartnerTotalRevenues($user_id);
            $totalRevenueByMonth = $this->revenueModel->getPartnerTotalRevenuesByMonth(getMonth(TODAY), $user_id);
            $drivers = $this->driverModel->getDriversByPartnerId($user_id);

            $data = [
                'drivers' => $drivers,
                'recentHistory' => $recentHistory,
                'history' => $history,
                'notif' => $notif,
                'totalRevenue' => $totalRevenue,
                'totalProductSold' => $totalProductSold,
                'totalRevenueByMonth' => $totalRevenueByMonth,
                'clientRevenueChartData' => $this->clientRevenueChartData($user_id),
                'clientSoldChartdata' => $this->clientSoldChartdata($user_id),
            ];

            $this->views('partner/partner', $data);
        } else {
            redirector('users/login');
        }
    }

    public function add()
    {
        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
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
            $mailData = [
                'password' => $password,
                'username' => $data['username'],
                'email' => $data['partner_email'],
            ];
            if (mailer($mailData)) {
                $create = $this->partnerModel->createPartner($data);
                if ($create) {
                    echo "Partner Created/" . $create;
                } else {
                    echo "Partner Not Created";
                }
            } else {
                echo "We could not send mail";
            }
        } else {
            redirector('');
        }
    }

    public function viewPartner()
    {
        if ("POST" == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
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

    public function viewOrder()
    {
        if ("POST" == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
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
            <p> <?php echo ($order->order_status == 0) ? 'Pending' : 'Delivered' ?></p>
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

    public function showDetails()
    {
        if ("POST" == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $password = generateRandomPassword();
            if ($this->storeGeneratedPassword($password, $_POST['id'])) {
                $partner = $this->partnerModel->getPartner($_POST['id']);
                $url = SITEURL;
                echo "
                <div class='text-center'><i class='fa fa-check-circle fa-3x text-success'></i></div>
                <h2 class='text-center text-capitalize'>Partner Created</h2>
                <div id='newPartnerItems'>
                <p>Username</p>
                <h3>$partner->username</h3>
                <p>Password</p>
                <h3>$password</h3>
                <form action='' method='post'>
                <input type='hidden' value='$partner->username' name='u' />
                <input type='hidden' value='$password' name='p' />
                <button type='button' class='btn btn-primary cancel'>Close </button>
                </form>
                </div>
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
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
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

        } else {
            redirector('');
        }

    }

    public function updateAccount()
    {
        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'partner_account_number' => $_POST['accnum'],
                'partner_account_name' => $_POST['accname'],
                'partner_bank_name' => $_POST['bankname'],
            ];
            $update = $this->partnerModel->updatePartner($_POST['uid'], $data);
            if ($update) {
                echo "Partner Account Updated";
            } else {
                echo "Partner Account Failed to Update";
            }
        } else {
            redirector('');
        }
    }

    public function update()
    {
        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'partner_status' => $_POST['status'],
            ];
            $update = $this->partnerModel->updatePartner($_POST['id'], $data);
            if ($update) {
                echo "Partner Account Updated";
            } else {
                echo "Partner Account Failed to Update";
            }
        } else {
            redirector('');
        }
    }

    public function delete($id = 0)
    {
        if ("POST" == $_SERVER['REQUEST_METHOD']) {
            if ($id != 0) {
                $delete = $this->partnerModel->deletePartner($id);
            } else {
                $delete = $this->partnerModel->deletePartners($_POST['emp_id']);
            }
            if (!$delete) {
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
                'order_status' => 1,
            ];
            $update = $this->historyModel->updateOrder($id, $data);
            if ($update) {
                echo "Delivered";
            } else {
                echo "Error occured";
            }
        } else {
            redirector('');
        }
    }

    private function clientRevenueChartData($id)
    {
        $revenues = $this->partnerModel->getClientRevenues($id);
        $chartData = '';
        foreach ($revenues as $row) {
            $chartData .= "{label: 'Petrol', value: $row->petrol},";
            $chartData .= "{label: 'Gas', value: $row->gas},";
            $chartData .= "{label: 'Diesel', value: $row->diesel}";
        }
        return json_encode($chartData);
    }

    private function clientSoldChartdata($id)
    {
        $products = $this->productModel->getClientProductSold($id);
        $chartData = '';
        foreach ($products as $row) {
            $chartData .= "{Month:'" . $row->month . "', Petrol:" . $row->Petrol . ", Gas:" . $row->Gas . ", Diesel:" . $row->Diesel . "  },";
        }
        return json_encode($chartData);
    }

}

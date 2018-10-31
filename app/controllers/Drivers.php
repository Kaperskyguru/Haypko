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
            $drivers = $this->driverModel->getDriversByPartnerId($_SESSION['user_id']);

            $data = [
                'drivers' => $drivers,

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
            $err_code = 0;
            $data = [
                'name' => $_POST['name'],
                'username' => $this->driverModel->generateUsername($_POST['name']),
                'password' => generateHashes($password),
                'location' => $_POST['address'],
                'email' => $_POST['email'],
                'admin_id' => ($_POST['type'] == 'admin') ? $_SESSION['user_id']:0,
                'mobile' => $_POST['phone'],
                'partner_id' => ($_POST['type'] == 'partner') ? $_SESSION['user_id']:0,

                'name_err' => '',
                'location_err' => '',
                'email_err' => '',
                'mobile_err' => '',
            ];

            // validate name
            if (  empty(  $data[ 'name' ]  )  ) {
                $data[ 'name_err' ] = 'Please enter a name';
                $err_code = 1;
            }

            // validate location
            if (  empty(  $data[ 'location']  )  ) {
                $data[ 'location_err' ] = 'Please enter location';
                $err_code = 1;
            }

            // validate email
            if (  empty(  $data[ 'email']  )  ) {
                $data[ 'email_err' ] = 'Please enter email';
                $err_code = 1;
            }

            // validate mobile
            if (  empty(  $data[ 'mobile']  )  ) {
                $data[ 'mobile_err' ] = 'Please enter Mobile Phone';
                $err_code = 1;
            }

            if ( $err_code == 0  ) {

                $mailData = [
                    'password'=> $password,
                    'username'=> $data['username'],
                    'email'=> $data['email']
                ];

                if(mailer($mailData)){
                    $create = $this->driverModel->createDriver($data);
                    if($create) {
                        echo "Driver Created/".$create;
                    } else {
                        echo "Driver Not Created";
                    }
                } else {
                    echo "We could not send mail";
                }
            } else {
                echo 'All fields required';
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

    public function showDetails() {
        if ("POST" == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
            if ($driver = $this->driverModel->getDriver($_POST['id'])) {
                $url = SITEURL;
                echo "
                <div class='text-center'><i class='fa fa-check-circle fa-3x text-success'></i></div>
                <h2 class='text-center text-capitalize'>Partner Created</h2>
                <div id='newPartnerItems'>
                <p>Username</p>
                <h3>$driver->username</h3>
                <p>Password</p>
                <h3>Mailed</h3>
                <button type='button' class='btn btn-primary cancel'>Close </button>
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

    public function viewDriver() {
        if ("POST" == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
            $driver = $this->driverModel->getDriver($_POST['id']);
            ?>
            <p>Delivery Agent Name</p>
            <h4><?php echo $driver->name ?></h4>
            <p>Delivery Agent Email</p>
            <h4><?php echo $driver->email ?> Litres</h4>
            <p>Location</p>
            <h4><?php echo $driver->location_id ?></h4>
            <p>Delivery Agent Mobile</p>
            <h4><?php echo $driver->mobile ?></h4>
            <p>Date Created</p>
            <h4><?php echo get_formatted_date($driver->date_created) ?></h4>
            <?php ;
        } else {
            redirector('');
        }
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

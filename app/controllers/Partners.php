<?php
/**
 *
 */
class Partners extends Controller
{
    private $partnerModel;
    function __construct()
    {
        $this->partnerModel = $this->model(  'Partner'  );
        $this->historyModel = $this->model('History');
    }

    public function index()
    {   // Caching here
        if (isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] === USER_TYPE) {
            $history = $this->historyModel->getHistories();
            $data = [
                'history' => $history,
            ];
            // $d = [
            //     'id' =>1,
            //     'password'=>'aksnsa',
            //     'username'=>'askjaj',
            //     'email'=>'solomoneseme@gmail.com'
            // ];
            //
            // mailer($d);
            $this->views('partner/partner', $data);
        } else {
            redirector( 'users/login');
        }
    }

    public function add() {
        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
            $data = [
                'partner_name' => $_POST['name'],
                'username' => $this->partnerModel->generateUsername($_POST['name']),
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
                echo "Partner Created/".$create;
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

    public function sendDetails()
    {

        if ("POST" == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );

        }
    }

    public function showDetails() {
        if ("POST" == $_SERVER['REQUEST_METHOD']) {
            $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
            $password = generateRandomPassword();
            if ($this->storeGeneratedPassword($password, $_POST['id'])) {
                $partner = $this->partnerModel->getPartner($_POST['id']);
                echo "
                <p>Username</p>
                <h3>$partner->username</h3>
                <p>Password</p>
                <h3>$password</h3>
                <button type='button' pid='$partner->id' class='btn btn-primary'>Send </button>
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
               if(!$delete) {
                   echo "Partner Not Deleted";
               } else {
                   echo "Partner Deleted";
               }
            }
        } else {
            redirector('');
        }
    }

}

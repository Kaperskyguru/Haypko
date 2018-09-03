<?php

    class Users extends Controller
    {
        private $customer_id;
        private $order_id;
        private $userModel;
        const COOKIE_NAME = "auth_cookie";
        const SESSION_TIME = 604800; // 7 days
        private $is_authenticated;
        private $session_start_time;
        // $this->session_start_time = time();

        public function __construct(    )
        {
            $this->userModel = $this->model(  'user'  );
        }

        public function login()
        {
            if (!isset($_SESSION['user_id'])) {
                if (  'POST' == $_SERVER[ 'REQUEST_METHOD' ]  ) {

                    $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );

                    $err_code = 0;

                    $data = [
                        'type' => $_POST[ 'type' ],
                        'username' => $_POST[ 'uname' ],
                        'password' => $_POST[ 'upass' ],
                        'password_err' => '',
                        'type_err' => '',
                        'username_err' => '',
                        'table' => $this->getType($_POST['type'])
                    ];

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

                        if (  $this->userModel->login(  $data  )  ) {

                            if (  $this->createUserSession(  $_SESSION['user_id']  )  ) {
                                if ($this->getType($_POST['type']) == 'customers') {
                                    $_SESSION['user_type'] = USER_TYPE;
                                    redirector(  'partners/'  );
                                } else if ($this->getType($_POST['type']) == 'partners') {
                                    $_SESSION['user_type'] = USER_TYPE;
                                    redirector(  'partners/'  );
                                } else {
                                    $_SESSION['user_type'] = ADMIN_TYPE;
                                    redirector(  'admin/'  );
                                }

                            }
                        } else {
                            $data[ 'username_err' ] = 'Something went wrong, try again';
                            $this->views(  'users/signin', $data  );
                        }

                    } else {

                        $data[ 'password_err' ] = 'Email and password combination not correct';
                        $this->views(  'users/signin', $data  );
                    }

                } else {

                    $data = [
                        'type' => '',
                        'username' => '',
                        'password' => '',
                        'password_err' => '',
                        'type_err' => '',
                        'username_err' => '',
                    ];

                    $this->views(  'users/signin', $data  );
                }

            } else {
                if ($_SESSION['user_type'] === ADMIN_TYPE) {
                    redirector( 'admin/' );
                } else {
                    redirector( 'partners/' );
                }
            }

        }

        public function register(  )
        {
            if ( 'POST' == $_SERVER[ 'REQUEST_METHOD' ] ) {
                $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
                $data = [
                    'name' => $_POST[ 'name' ],
                    'email' => $_POST[ 'email' ],
                    'city' => $_POST[ 'city' ],
                    'state' => $_POST[ 'state' ],
                    'address' => $_POST[ 'address' ],
                    'rcnumber' => $_POST[ 'rcnumber' ],
                    'mobile' => $_POST[ 'mobile' ],
                    'name_err' => '',
                    'email_err' => '',
                    'city_err' => '',
                    'state_err' => '',
                    'address_err' => '',
                    'rcnumber_err' => '',
                    'mobile_err' => '',
                ];

                if (  $this->userModel->storePartner(  $data  )  ) {
                    echo "Registered Successfully, Email is sent to you";
                } else {
                    echo 'Registration failed, try again';
                }
            } else {
                redirector('');
            }
        }

        public function updatePass($id)
        {
            if ("POST" == $_SERVER['REQUEST_METHOD']) {
                $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );
                $data = [
                    'password' => generateHashes($_POST['npassword']),
                ];
                if ($this->userModel->getUserPassword($id) == $data['password']) {
                    if ($this->userModel->update($id, $data)) {
                        echo "password updated successfully";
                    } else {
                        echo "An error occured";
                    }
                }else {
                    echo "Current password not match";
                }

            } else {
                redirector('');
            }

        }

        private function createUserSession(int $id)
        {
            try {
                if ($this->userModel->storeSession($id)) {
                    setcookie(self::COOKIE_NAME, $cookie, time() + self::SESSION_TIME, "/");
                    $_COOKIE[self::COOKIE_NAME] = $cookie;
                    return true;
                }
                return false;
            } catch (Exception $e) {
                $_SESSION['error'] = $e->getMessage();
                // $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
                return false;
            }
        }

        public function logout($user_id, $close_all_sessions = false)
        {
            try {

                $cookie_md5 = md5($_COOKIE[self::COOKIE_NAME]);

                if ($close_all_sessions) {
                    $this->userModel->deleteSession($user_id);
                } else {
                    $this->userModel->deleteSession($user_id, $cookie_md5);
                }
                setcookie(self::COOKIE_NAME, '', 0, '/');
                $_COOKIE[self::COOKIE_NAME] = null;

                $_SESSION['user_id'] = null;
                $_SESSION['user_type'] = null;
                unset($_SESSION['user_id']);
                unset($_SESSION['user_type']);
                $this->is_authenticated = false;
                redirector('');
            } catch (Exception $e) {
                 echo $e->getMessage();
            }
        }


        private function getType($type)
        {
            if ($type == 'customer') {
                return 'customers';
            } elseif ($type == 'partner') {
                return 'partners';
            } else {
                return 'users';
            }
        }
    }

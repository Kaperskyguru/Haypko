<?php

    class Users extends Controller
    {
        private $customer_id;
        private $order_id;
        private $userModel;

        public function __construct(    )
        {
            $this->userModel = $this->model(  'user'  );
        }

        public function login(    )
        {
            if (  'POST' == $_SERVER[ 'REQUEST_METHOD' ]  ) {
                $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );

                $err_code = 0;

                $data = [
                    'type' => $_POST[ 'type' ],
                    'username' => $_POST[ 'username' ],
                    'password' => $_POST[ 'password' ],
                    'password_err' => '',
                    'type_err' => '',
                    'username_err' => '',
                ];

                // validate Password
                if (  empty(  $data[ 'password' ]  )  ) {
                    $data[ 'password_err' ] = 'Please enter a password';
                    $err_code = 1;
                }

                // validate email
                if (  empty(  $data[ 'email']  )  ) {
                    $data[ 'email_err' ] = 'Please enter email';
                    $err_code = 1;
                }

                if (  $err_code == 0  ) {

                    if (  $this->userModel->login(  $data  )  ) {

                        if (  $this->createUserSession(  $loggedInUser  )  ) {
                            redirector(  'admin/'  );
                        }
                    } else {
                        echo 'Something went wrong, try again';
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
            }
        }
    }

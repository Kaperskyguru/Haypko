<?php

    class Users extends Controller
    {
        private $customer_id;
        private $order_id;
        private $userModel;

        public function __construct(    )
        {
            $this->userModel = $this->model(  'user'  );
            $this->partnerModel = $this->model( 'partner' );
        }

        public function index() {
            $data = [
                'partner_name' => 'PMT001',
                'partner_location' => 'Ayobo',
                'partner_date_created' => time()
            ];
            $create = $this->partnerModel->createPartner($data);
            if($create) {
                echo "Partner Created";
            } else {
                echo "Partner Not Created";
            }
        }

        public function partner($id) {
            print_r($this->partnerModel->getPartner($id));
        }

        public function partners() {
            print_r($this->partnerModel->getPartners());
        }

        public function update() {
            $data = [
                'partner_name' => 'GENIUS002',
                'partner_location' => 'Ikeja'
            ];
            $update = $this->partnerModel->updatePartner(1, $data);
            if($update) {
                echo "Partner Updated";
            } else {
                echo "Partner Failed to Update";
            }
        }

        public function delete($id) {
            $delete = $this->partnerModel->deletePartner($id);
            if(!$delete) {
                echo "Partner Not Deleted";
            } else {
                echo "Partner Deleted";
            }
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

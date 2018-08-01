<?php
    /**
     *
     */
    class Users extends Controller
    {
        private $customer_id;
        private $order_id;

        public function __construct()
        {
            $this->customerModel = $this->model('index');
        }

        public function login()
        {
            $this->views('users/signin');
        }
    }

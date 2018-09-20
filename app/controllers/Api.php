<?php

    class Api extends Controller
    {
        private $historyModel;
        function __construct()
        {
            $this->indexModel = $this->model('index');
            $this->productModel = $this->model('Product');
            $this->partnerModel = $this->model('Partner');
            $this->revenueModel = $this->model('Revenue');
        }

        public function index()
        {
            $data = [];
            // $this->views('api/chart', $data);
        }

        public function partners()
        {
            $partner = $this->partnerModel->getPartners();
            $this->views('api/partners', $partner);
        }

        public function products($id)
        {
            $productSoldData = $this->productModel->getClientProductSold($id);
            // var_dump($productSoldData);
            $this->views('api/clientdata', $productSoldData);
        }

        public function clientRevenue($id)
        {
            $revenue1 = $this->partnerModel->getClientRevenues($id);
            $this->views('api/clientrevenue', $revenue1);
        }

        public function chart()
        {
            $revenue = $this->revenueModel->getRevenues();
            $this->views('api/chart', $revenue);
        }

        public function orders()
        {
            $orders = $this->indexModel->getCustomerStatistics();
            $this->views('api/orders', $orders);
        }

        public function sold()
        {
            $products = $this->productModel->getProductSold();
            $this->views('api/sold', $products);
        }

        public function prices()
        {
            $prices = $this->productModel->getPrices();
            $this->views('api/prices', $prices);
        }

        public function sms()
        {
            // $prices = $this->productModel->getPrices();
            $this->views('api/smstest', $data = []);
        }
    }

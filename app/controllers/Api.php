<?php
    //TODO Change the endpoints to unique characters
    class Api extends Controller
    {
        private $historyModel;
        function __construct()
        {
            $this->indexModel = $this->model('index');
            $this->productModel = $this->model('Product');
            $this->partnerModel = $this->model('Partner');
            $this->revenueModel = $this->model('Revenue');
            $this->historyModel = $this->model('History');
        }

        public function index()
        {
            $data = [];
            // $this->views('api/chart', $data);
        }

        public function partners()
        {
            $partner = $this->partnerModel->getPartners();
            $this->views('api/v1/charts/partners', $partner);
        }

        public function products($id)
        {
            $productSoldData = $this->productModel->getClientProductSold($id);
            $this->views('api/v1/charts/clientdata', $productSoldData);
        }

        public function clientRevenue($id)
        {
            $revenue1 = $this->partnerModel->getClientRevenues($id);
            $this->views('api/v1/charts/clientrevenue', $revenue1);
        }

        public function chart()
        {
            $revenue = $this->revenueModel->getRevenues();
            $this->views('api/v1/charts/chart', $revenue);
        }

        public function chartOrders()
        {
            $orders = $this->indexModel->getCustomerStatistics();
            $this->views('api/v1/charts/orders', $orders);
        }

        public function orders(int $id = 33)
        {
            $orders = $this->historyModel->getAllHistoryDetails($id);
            if ($orders != null) {
                $response['error'] = false;
                $response['message'] = 'Orders Retrieved';
                $response['orders'] = $orders;
            }else{
                $response['error'] = false;
                $response['message'] = 'No order found';
                $response['orders'] = $orders;

            }
            $this->views('api/v1/mobile/orders', $response);
        }

        public function sold()
        {
            $products = $this->productModel->getProductSold();
            $this->views('api/v1/charts/sold', $products);
        }

        public function prices()
        {
            $prices = $this->productModel->getPrices();
            $this->views('api/v1/charts/prices', $prices);
        }

        public function sms()
        {
            // $prices = $this->productModel->getPrices();
            $this->views('api/v1/charts/smstest', $data = []);
        }
    }

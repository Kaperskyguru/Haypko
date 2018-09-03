<?php

    class Api extends Controller
    {
        private $historyModel;
        function __construct()
        {
            $this->historyModel = $this->model('History');
            $this->indexModel = $this->model('index');
            $this->productModel = $this->model('product');
        }

        public function index()
        {
            $data = [];
            // $this->views('api/chart', $data);
        }

        public function chart()
        {
            $revenue = $this->historyModel->getRevenues();
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
    }

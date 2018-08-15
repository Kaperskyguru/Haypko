<?php

    class Api extends Controller
    {
        private $historyModel;
        function __construct()
        {
            $this->historyModel = $this->model('History');
        }

        public function index()
        {
            $data = [];
            // $this->views('api/chart', $data);
        }

        public function chart()
        {
            $gasAmount = $this->historyModel->getTotalAmountOfProduct('gas');
            $petrolAmount = $this->historyModel->getTotalAmountOfProduct('petrol');
            $dieselAmount = $this->historyModel->getTotalAmountOfProduct('diesel');

            $data = [
                $gasAmount,
                $petrolAmount,
                $dieselAmount,
            ];
            $this->views('api/chart', $data);
        }
    }

<?php
    /**
     *
     */
    class Admin extends Controller
    {
        private $partnerModel;
        private $stationModel;
        private $historyModel;

        public function __construct()
        {
            $this->partnerModel = $this->model('Partner');
            $this->stationModel = $this->model('Station');
            $this->historyModel = $this->model('History');
            $this->customerModel = $this->model('user');
        }

        public function index()
        {   // Caching here
            $partners = $this->partnerModel->getPartners();
            $history = $this->historyModel->getHistories();
            $stations = $this->stationModel->getStations();
            $customer = $this->customerModel->getCustomers();
            $amount = $this->historyModel->getTotalAmountOfProduct('gas');
            $data = [
                'partners' => $partners,
                'stations' => $stations,
                'history' => $history,
                'amount' =>  $amount,
            ];

            $this->views('admin/dashboard', $data);
        }

        public function retailer()
        {   // Caching here
            $partners = $this->partnerModel->getPartners();
            $history = $this->historyModel->getHistories();
            $stations = $this->stationModel->getStations();
            $customer = $this->customerModel->getCustomers();
            $amount = $this->historyModel->getTotalAmountOfProduct('gas');
            $data = [
                'partners' => $partners,
                'stations' => $stations,
                'history' => $history,
                'amount' =>  $amount,
            ];

            $this->views('admin/retailer', $data);
        }
    }

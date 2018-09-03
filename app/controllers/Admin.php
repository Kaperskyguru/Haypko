<?php
    /**
     *
     */
    class Admin extends Controller
    {
        private $partnerModel;
        private $stationModel;
        private $historyModel;
        private $productModel;

        public function __construct()
        {
            $this->partnerModel = $this->model('Partner');
            $this->stationModel = $this->model('Station');
            $this->historyModel = $this->model('History');
            $this->customerModel = $this->model('user');
            $this->productModel = $this->model('product');
        }

        public function index()
        {   // Caching here
            if (isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] === ADMIN_TYPE) {
                $partners = $this->partnerModel->getPartners();
                $history = $this->historyModel->getHistories();
                $stations = $this->stationModel->getStations();
                $product = $this->productModel->getProducts();
                // $amount = $this->historyModel->getTotalAmountOfProduct('gas');
                $data = [
                    'partners' => $partners,
                    'stations' => $stations,
                    'history' => $history,
                    // 'amount' =>  $amount,
                    'products' => $product,
                ];

                $this->views('admin/dashboard', $data);
            } else {
                redirector( 'users/login');
            }

    }
}

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
    private $revenueModel;

    public function __construct()
    {
        $this->partnerModel = $this->model('Partner');
        $this->historyModel = $this->model('History');
        $this->customerModel = $this->model('user');
        $this->productModel = $this->model('Product');
        $this->notifModel = $this->model('notify');
        $this->indexModel = $this->model('index');
        $this->revenueModel = $this->model('Revenue');
        $this->driverModel = $this->model('Driver');
    }

    public function index()
    { // Caching here
        if (isset($_SESSION['user_id']) && isset($_SESSION['user_type']) && $_SESSION['user_type'] === ADMIN_TYPE) {
            $partners = $this->partnerModel->getPartners();
            $history = $this->historyModel->getHistories();
            $product = $this->productModel->getProducts();
            $drivers = $this->driverModel->getDriversByAdminId($_SESSION['user_id']);
            $notify = $this->notifModel->get_notifications();
            $totalProductSold = $this->productModel->get_total_Product_sold();
            $total = $this->indexModel->getTotalCustomers();
            $totalRevenue = $this->revenueModel->getTotalRevenues();
            $totalRevenueByMonth = $this->revenueModel->getTotalRevenuesByMonth(getMonth(TODAY));

            // var_dump($product);
            $data = [
                'drivers' => $drivers,
                'partners' => $partners,
                'history' => $history,
                'notify' => $notify,
                'products' => $product,
                'total' => $total,
                'totalProductSold' => $totalProductSold,
                'totalRevenue' => doubleval($totalRevenue),
                'totalRevenueByMonth' => doubleval($totalRevenueByMonth),
                'revenueChartData' => $this->revenueChartdata(),
                'ordersChartdata' => $this->ordersChartdata(),
                'soldChartdata' => $this->soldChartdata(),
            ];

            $this->views('admin/dashboard', $data);
        } else {
            redirector('users/login');
        }
    }

    public function notify()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'content' => $_POST['content'],
                'partner_id' => $_POST['partner_id'],
            ];
            $this->notifModel->add_notification($data);
        }
    }

    private function revenueChartdata()
    {
        $revenues = $this->revenueModel->getRevenues();
        $chartData = '';
        foreach ($revenues as $row) {
            $chartData .= "{Month:'" . $row->Month . "', Petrol:" . $row->Petrol . ", Gas:" . $row->Gas . ", Diesel:" . $row->Diesel . " },";
        }
        return json_encode($chartData);
    }

    private function ordersChartdata()
    {
        $orders = $this->indexModel->getCustomerStatistics();
        $chartData = '';
        foreach ($orders as $row) {
            $chartData .= "{Month:'" . $row->month . "', New:" . $row->new . ", Returning:" . $row->returning . " },";
        }
        return json_encode($chartData);
    }

    private function soldChartdata()
    {
        $products = $this->productModel->getProductSold();
        $chartData = '';
        foreach ($products as $row) {
            $chartData .= "{Month:'" . $row->month . "', Petrol:" . $row->Petrol . ", Gas:" . $row->Gas . ", Diesel:" . $row->Diesel . "  },";
        }
        return json_encode($chartData);
    }

}

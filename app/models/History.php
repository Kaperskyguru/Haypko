<?php
/**
*
*/
class History
{
    private $db;
    protected $table = 'orders';

    function __construct()
    {
        $this->db = new Database;
    }

    public function createOrder(array $data)
    {
        $query = "INSERT INTO {$this->table} (Order_name, order_location, order_state, order_city, order_email, order_mobile, order_rc_number) VALUES
        (:order_name, :order_location, :order_state, :order_city, :order_email, :order_mobile, :order_rc_number)";
        $this->db->query($query);
        $this->db->bind(':order_name', $data['name']);
        $this->db->bind(':order_location', $data['address']);
        $this->db->bind(':order_state', $data['state']);
        $this->db->bind(':order_city', $data['city']);
        $this->db->bind(':order_email', $data['email']);
        $this->db->bind(':order_mobile', $data['mobile']);
        $this->db->bind(':order_rc_number', $data['rcnumber']);
        if ($this->db->execute()) {
            return true;
        }
        return false;
    }

    //COPY
    public function getHistories()
    {
        $this->db->query("SELECT id AS order_id, product_name, customer_id AS order_customer_id, date_added AS order_date_added, litres AS order_litres, product_amount AS order_amount, partner_id AS order_partner_id, reference_id AS order_reference_id, status_id AS order_status FROM order_group WHERE partner_id = :id ORDER BY id DESC");
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }
    
    //COPY
    public function getHistoriesByUserId(int $id)
    {
        $this->db->query("SELECT id AS order_id, product_name, customer_id AS order_customer_id, date_added AS order_date_added, litres AS order_litres, product_amount AS order_amount, partner_id AS order_partner_id, reference_id AS order_reference_id, status_id AS order_status FROM order_group WHERE partner_id = :id ORDER BY status_id");
        $this->db->bind(':id', $id);
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }

    //COPY
    public function getAllHistoryDetails(int $id)
    {
        $query = "SELECT order_group.id AS order_id, order_group.product_group_id AS code, order_group.product_name AS product, order_group.litres AS quantity,order_group.product_amount AS amount, order_group.reference_id AS reference_id, order_group.date_added AS order_date, customers.customer_name AS name,customers.customer_email AS email,customers.customer_phone AS phone, partners.partner_name AS partner, addresses.address_text AS address, order_group.status_id AS status FROM order_group JOIN customers JOIN partners JOIN addresses ON order_group.customer_id = customers.id AND order_group.partner_id = :id AND customers.id = addresses.address_customer_id AND order_group.partner_id = partners.id ORDER BY status_id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }


    //COPY
    public function getRecentHistoriesByUserId(int $id)
    {
        $this->db->query("SELECT id AS order_id, product_name, customer_id AS order_customer_id, date_added AS order_date_added, litres AS order_litres, product_amount AS order_amount, partner_id AS order_partner_id, reference_id AS order_reference_id, status_id AS order_status FROM order_group WHERE partner_id = :id ORDER BY id DESC LIMIT 4");
        $this->db->bind(':id', $id);
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }


    public function getMonthOfProduct(string $product_name)
    {
        $this->db->query("SELECT product_name, SUM(order_amount) AS amount, MONTH(order_date_added) AS month FROM {$this->table} GROUP BY order_amount, month");
        $this->db->bind(':product_name', $product_name);
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }

    //COPY
    public function getOrder(int $id)
    {
        $this->db->query("SELECT id AS order_id, product_name, customer_id AS order_customer_id, date_added AS order_date_added, litres AS order_litres, product_amount AS order_amount, partner_id AS order_partner_id, reference_id AS order_reference_id, status_id AS order_status FROM order_group WHERE id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function updateOrder(int $int, array $data)
    {
        $paramsArray = [];
        foreach($data as $key => $value) {
            array_push($paramsArray, $key." = :".$key);
        }
        $params = implode(', ', $paramsArray);
        $this->db->query("UPDATE order_group SET {$params} WHERE id = :order_id");
        foreach($data as $column => $value) {
            $this->db->bind(":".$column, $value);
        }
        $this->db->bind(":order_id", $int);
        if(!$this->db->execute()) {
            return false;
        }
        return true;
    }

    public function updateBulkOrder(string $code, array $data)
    {
        $paramsArray = [];
        foreach($data as $key => $value) {
            array_push($paramsArray, $key." = :".$key);
        }
        $params = implode(', ', $paramsArray);
        $this->db->query("UPDATE orders SET {$params} WHERE product_group_code = :code AND order_status = 0");
        foreach($data as $column => $value) {
            $this->db->bind(":".$column, $value);
        }
        $this->db->bind(":code", $code);
        if(!$this->db->execute()) {
            return false;
        }
        return true;
    }
    

    public function deleteOrder(int $id) {
        $this->db->query("DELETE FROM order_group WHERE id = :order_id");
        $this->db->bind(':order_id', $id);
        if(!$this->db->execute()) {
            return false;
        }
        return true;
    }
}

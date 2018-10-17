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

    public function getHistories()
    {
        $this->db->query("SELECT * FROM {$this->table} ORDER BY order_id DESC");
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function getHistoriesByUserId(int $id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE order_partner_id = :id ORDER BY order_status");
        $this->db->bind(':id', $id);
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function getAllHistoryDetails(int $id)
    {
        $query = "SELECT orders.order_id, orders.product_name AS product, orders.order_litres AS quantity,orders.order_amount AS amount, orders.order_reference_id AS reference_id,orders.order_date_added AS order_date, customers.customer_name AS name,customers.customer_email AS email,customers.customer_phone AS phone, partners.partner_name AS partner, addresses.address_text AS address, orders.order_status AS status FROM {$this->table} JOIN customers JOIN partners JOIN addresses ON orders.order_customer_id = customers.id AND orders.order_partner_id = :id AND customers.id = addresses.address_customer_id AND orders.order_partner_id = partners.id ORDER BY order_status";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }



    public function getRecentHistoriesByUserId(int $id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE order_partner_id = :id AND order_status = 0 ORDER BY order_id DESC LIMIT 4");
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

    public function getOrder(int $id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE order_id = :order_id");
        $this->db->bind(':order_id', $id);
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
        $this->db->query("UPDATE {$this->table} SET {$params} WHERE order_id = :order_id");
        foreach($data as $column => $value) {
            $this->db->bind(":".$column, $value);
        }
        $this->db->bind(":order_id", $int);
        if(!$this->db->execute()) {
            return false;
        }
        return true;
    }

    public function deleteOrder(int $id) {
        $this->db->query("DELETE FROM {$this->table} WHERE order_id = :order_id");
        $this->db->bind(':order_id', $id);
        if(!$this->db->execute()) {
            return false;
        }
        return true;
    }
}

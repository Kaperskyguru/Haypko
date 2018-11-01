<?php
/**
*
*/
class product
{
    private $db;
    private $table = "products";

    function __construct( Database $db )
    {
        $this->db = $db;
    }

    public function getProducts()
    {
        $this->db->query("SELECT * FROM {$this->table}");
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function getOrderGroup()
    {
        $this->db->query("SELECT * FROM order_group");
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function getPrices()
    {
        $this->db->query("SELECT product_price, product_name, product_date_added FROM {$this->table}");
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function getPrice(string $name)
    {
        $this->db->query("SELECT product_price FROM {$this->table} WHERE product_name = :name");
        $this->db->bind(':name', $name);
        $row = $this->db->single();
        if (!$row) {
            return null;
        }
        return $row->product_price;
    }

    public function getProductSold()
    {
        $this->db->query("SELECT Petrol, Gas, Diesel, month FROM productsold");
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function getClientProductSold($id)
    {

        $this->db->query("SELECT Petrol, Gas, Diesel, month FROM clientProductSold WHERE partner_id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function get_total_Product_sold()
    {
        $this->db->query("SELECT SUM(Petrol) AS petrol, SUM(Gas) AS gas, SUM(Diesel) AS diesel FROM productsold");
        $row = $this->db->single();
        if (!$row) {
            return null;
        }
        return $row->petrol + $row->gas + $row->diesel;
    }

    public function getProduct($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE product_id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function getProductId($product)
    {
        $this->db->query("SELECT product_id FROM {$this->table} WHERE product_name = :product");
        $this->db->bind(':product', $product);
        $row = $this->db->single();
        if (!$row) {
            return null;
        }
        return $row->product_id;
    }

    public function getOrderGroupById($id)
    {
        $this->db->query("SELECT product_group_id FROM order_group WHERE id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if (!$row) {
            return null;
        }
        return $row->product_group_id;
    }

    public function getOrderGroupByGroupCode(string $code)
    {
        $this->db->query("SELECT * FROM order_group WHERE product_group_id = :code");
        $this->db->bind(':code', $code);
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function updateAll(array $data)
    {
        for ($i = 1; $i<= count($data); $i++) {
            $this->db->query("UPDATE {$this->table} SET product_price = {$data[$i]} WHERE product_id = :product_id");
            $this->db->bind(':product_id', $i);
            if(!$this->db->execute()) {
                return false;
            }
        }
        return true;
    }

    public function addProductGroup(array $data, int $customer_id)
    {
        $group_id = $this->generateUsername(generateRandomPassword());
        $query = "INSERT INTO order_group (product_name, litres, product_amount, customer_id, product_group_id) VALUES (:name, :litres, :amount, :id, :group_id)";
        $this->db->query($query);
        foreach ($data['products'] as $product) {
            $this->db->bind(':name', $product['name']);
            $this->db->bind(':litres', $product['litre']);
            $this->db->bind(':amount', $product['price']);
            $this->db->bind(':id', $customer_id);
            $this->db->bind(':group_id', $group_id);
            $this->db->execute();
        }
        return $this->db->getLastInsertedID();
    }

    public function generateUsername(string $name): string
    {
        //generate username from name
        $names = explode(' ', $name);
        $username = $names[0] . $names[1];
        $rows = $this->getOrderGroup();
        foreach ($rows as $row) {
            $r[] = $row->product_group_id;
        }
        if (in_array($username, $r)) {
            $count = 0;
            while (in_array( ($username. ''. ++$count) , $r) );
            $username = $username. '' .$count;

        }
        return $username;
    }
}

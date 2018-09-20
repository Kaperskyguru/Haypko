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

        public function getPrice($product)
        {
            $this->db->query("SELECT product_price FROM {$this->table} WHERE product_name = :name");
            $this->db->bind(':name', $product);
            $row = $this->db->single();
            if (!$row) {
                return null;
            }
            return $row->product_price;
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
}

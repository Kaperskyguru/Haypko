<?php
    /**
     *
     */
    class index
    {
        private $id;

        function __construct()
        {
            $this->db = new Database;
        }

        public function storeCustomerDetails(array $data)
        {
            $query = "INSERT INTO customers (customer_name, customer_email, customer_phone) VALUES (:name, :email, :phone)";
            $this->db->query($query);
            $this->db->bind(':name', $data['customer_name']);
            $this->db->bind(':email', $data['customer_email']);
            $this->db->bind(':phone', $data['customer_phone']);
            if ($this->db->execute()) {
                return $this->db->getLastInsertedID();
            }
            return 0;
        }

        public function saveTransaction(array $data)
        {
            $query = "INSERT INTO orders (product_name, order_litres, order_amount, order_customer_id, order_reference_id) VALUES (:name, :litres, :amount, :customer_id, :ref_id)";
            $this->db->query($query);
            $this->db->bind(':name', $data['product']);
            $this->db->bind(':litres', $data['litres']);
            $this->db->bind(':amount', $data['amount']);
            $this->db->bind(':customer_id', $data['id']);
            $this->db->bind(':ref_id', $data['reference']);
            if ($this->db->execute()) {
                return $this->db->getLastInsertedID();
            }
            return 0;
        }

        public function getReferenceId($cust_id, $order_id)
        {
            $query = "SELECT order_reference_id FROM orders WHERE order_customer_id = :cust_id AND order_id = :id";
            $this->db->query($query);
            $this->db->bind(':cust_id', $cust_id);
            $this->db->bind(':id', $order_id);
            $row = $this->db->single();
            if ($row) {
                return $row->order_reference_id;
            }
            return null;
        }
    }

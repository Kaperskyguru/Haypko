<?php
    /**
     *
     */
    class index
    {
        private $id;
        private $table = 'revenue';

        function __construct( Database $db )
        {
            $this->db = $db;
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
            $query = "INSERT INTO orders (order_partner_id, order_amount, order_customer_id, order_reference_id, product_group_code) VALUES (:partner_id, :amount, :customer_id, :ref_id, :group_code)";
            $this->db->query($query);
            $this->db->bind(':partner_id', $data['partner_id']);
            $this->db->bind(':amount', $data['amount']);
            $this->db->bind(':customer_id', $data['customer_id']);
            $this->db->bind(':ref_id', $data['reference']);
            $this->db->bind(':group_code', $data['group_code']);
            if ($this->db->execute()) {
                return $this->db->getLastInsertedID();
            }
            return 0;
        }

        public function getCustomerAddressById($id)
        {
            $query = "SELECT address_text FROM addresses WHERE address_customer_id = :id";
            $this->db->query($query);
            $this->db->bind(':year', $id);
            $row = $this->db->single();
            if ($row) {
                return null;
            }
            return $row->address_text;
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

        public function getRevenueYear($year)
        {
            $query = "SELECT Year FROM revenue WHERE Year = :year";
            $this->db->query($query);
            $this->db->bind(':year', $year);
            $row = $this->db->single();
            if ($row) {
                return true;
            }
            return false;
        }

        public function getRevenueMonth($month)
        {
            $query = "SELECT Month FROM revenue WHERE Month = :month";
            $this->db->query($query);
            $this->db->bind(':month', $month);
            $row = $this->db->single();
            if ($row) {
                return true;
            }
            return false;
        }

        public function getCustomerYear($year)
        {
            $query = "SELECT year FROM customerstatistics WHERE year = :year";
            $this->db->query($query);
            $this->db->bind(':year', $year);
            $row = $this->db->single();
            if ($row) {
                return true;
            }
            return false;
        }

        public function getCustomerMonth($month)
        {
            $query = "SELECT month FROM customerstatistics WHERE month = :month";
            $this->db->query($query);
            $this->db->bind(':month', $month);
            $row = $this->db->single();
            if ($row) {
                return true;
            }
            return false;
        }

        public function getProductSoldYear($year)
        {
            $query = "SELECT year FROM productsold WHERE year = :year";
            $this->db->query($query);
            $this->db->bind(':year', $year);
            $row = $this->db->single();
            if ($row) {
                return true;
            }
            return false;
        }

        public function getProductSoldMonth($month)
        {
            $query = "SELECT month FROM productsold WHERE month = :month";
            $this->db->query($query);
            $this->db->bind(':month', $month);
            $row = $this->db->single();
            if ($row) {
                return true;
            }
            return false;
        }

        public function isCustomerExist($email, $phone)
        {
            $query = "SELECT id FROM customers WHERE  customer_email = :email OR customer_phone = :phone";
            $this->db->query($query);
            $this->db->bind(':email', $email);
            $this->db->bind(':phone', $phone);
            $row = $this->db->single();
            if ($row) {
                return true;
            } else {
            return false;
        }
        }

        public function updateRevenue(array $data)
        {
            if ($this->getRevenueYear($data['Year']) && $this->getRevenueMonth($data['Month'])) {
                $this->db->query("UPDATE {$this->table} SET {$data['col']} = {$data['col']} + :amount WHERE Month = :month AND Year = :year");
                $this->db->bind(":amount", $data['amount']);
                $this->db->bind(":month", $data['Month']);
                $this->db->bind(":year", $data['Year']);
                if(!$this->db->execute()) {
                    return false;
                }
                return true;
            } else {
                $query = "INSERT INTO {$this->table} (Gas, Petrol, Diesel, Month, Year) VALUES (:Gas, :Petrol, :Diesel, :Month, :Year)";
                $this->db->query($query);
                $this->db->bind(':Gas', $data['Gas']);
                $this->db->bind(':Petrol', $data['Petrol']);
                $this->db->bind(':Diesel', $data['Diesel']);
                $this->db->bind(':Month', $data['Month']);
                $this->db->bind(':Year', $data['Year']);
                if ($this->db->execute()) {
                    return true;
                }
                return false;
            }
        }


        public function updateCustomerStat(array $data)
        {
            if ($this->isCustomerExist($data['email'], $data['phone'])) {
                $this->updateCustomerStatis($data, 'returning');
            } else {
                $this->updateCustomerStatis($data, 'new');
            }


        }

        public function updateCustomerStatis($data, $col)
        {
            if ($this->getCustomerYear($data['year']) && $this->getCustomerMonth($data['month'])) {
                $this->db->query("UPDATE customerstatistics SET {$col} = {$col} + :val WHERE month = :month AND year = :year");
                $this->db->bind(":val", 1);
                $this->db->bind(":month", $data['month']);
                $this->db->bind(":year", $data['year']);
                if(!$this->db->execute()) {
                    return false;
                }
                return true;
            } else {
                $query = "INSERT INTO customerstatistics ( {$col}, month, year, product_id) VALUES ( :col, :month, :year, :product_id)";
                $this->db->query($query);
                $this->db->bind(':col', 1);
                $this->db->bind(':month', $data['month']);
                $this->db->bind(':year', $data['year']);
                $this->db->bind(':product_id', $data['product_id']);
                if ($this->db->execute()) {
                    return true;
                }
                return false;
            }
        }

        public function getCustomerStatistics()
        {
            $this->db->query("SELECT new, returning, month FROM customerstatistics ORDER BY MONTH(month) DESC");
            $row = $this->db->resultSet();
            if (!$row) {
                return null;
            }
            return $row;
        }

        public function getTotalCustomers()
        {
            $this->db->query("SELECT SUM(returning) AS old, SUM(new) AS new FROM customerstatistics");
            $row = $this->db->single();
            if (!$row) {
                return null;
            }
            return $row;
        }

        public function updateProductSold($data)
        {
            if ($this->getProductSoldYear($data['Year']) && $this->getProductSoldMonth($data['Month'])) {
                $this->db->query("UPDATE productsold SET {$data['col']} = {$data['col']} + :val WHERE month = :month AND year = :year");
                $this->db->bind(":val", 1);
                $this->db->bind(":month", $data['Month']);
                $this->db->bind(":year", $data['Year']);
                if(!$this->db->execute()) {
                    return false;
                }
                return true;
            } else {
                $query = "INSERT INTO productsold ( {$data['col']}, month, year) VALUES ( :col, :month, :year)";
                $this->db->query($query);
                $this->db->bind(':col', 1);
                $this->db->bind(':month', $data['Month']);
                $this->db->bind(':year', $data['Year']);
                if ($this->db->execute()) {
                    return true;
                }
                return false;
            }
        }

    }

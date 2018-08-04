<?php
    /**
     *
     */
    class Partner
    {
        private $db;
        protected $table = 'partners';

        function __construct()
        {
            $this->db = new Database;
        }

        public function createPartner(array $data)
        {
            $query = "INSERT INTO {$this->table} (partner_name, partner_location, partner_state, partner_city, partner_email, partner_mobile, partner_rc_number) VALUES
            (:partner_name, :partner_location, :partner_state, :partner_city, :partner_email, :partner_mobile, :partner_rc_number)";
            $this->db->query($query);
            $this->db->bind(':partner_name', $data['name']);
            $this->db->bind(':partner_location', $data['address']);
            $this->db->bind(':partner_state', $data['state']);
            $this->db->bind(':partner_city', $data['city']);
            $this->db->bind(':partner_email', $data['email']);
            $this->db->bind(':partner_mobile', $data['mobile']);
            $this->db->bind(':partner_rc_number', $data['rcnumber']);
            if ($this->db->execute()) {
                return true;
            }
            return false;
        }

        public function getPartners()
        {
            $this->db->query("SELECT * FROM {$this->table}");
            $row = $this->db->resultSet();
            if(!$row) {
                return null;
            }
            return $this->db->resultSet();
        }

        public function getPartner(int $id)
        {
            $this->db->query("SELECT * FROM {$this->table} WHERE partner_id = :partner_id");
            $this->db->bind(':partner_id', $id);
            if(!$this->db->single()) {
                return null;
            }
            return $this->db->single();
        }

        public function updatePartner(int $int, array $data)
        {
            $paramsArray = [];
            foreach($data as $key => $value) {
                array_push($paramsArray, $key." = :".$key);
            }
            $params = implode(', ', $paramsArray);
            $this->db->query("UPDATE {$this->table} SET {$params} WHERE partner_id = :partner_id");
            foreach($data as $column => $value) {
                $this->db->bind(":".$column, $value);
            }
            $this->db->bind(":partner_id", $int);
            if(!$this->db->execute()) {
                return false;
            }
            return true;
        }

        public function deletePartner(int $id) {
            $this->db->query("DELETE FROM {$this->table} WHERE partner_id = :partner_id");
            $this->db->bind(':partner_id', $id);
            if(!$this->db->execute()) {
                return false;
            }
            return true;
        }
}

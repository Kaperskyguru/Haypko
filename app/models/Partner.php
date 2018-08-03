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
            $query = "INSERT INTO {$this->table} (partner_name, partner_location) VALUES (:name, :location)";
            $this->db->query($query);
            $this->db->bind(':name', $data['partner_name']);
            $this->db->bind(':location', $data['partner_location']);
            if(!$this->db->execute()) {
                return false;
            }
            return true;
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

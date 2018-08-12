<?php
    /**
     *
     */
    class Partner
    {
        private $db;
        protected $table = 'partners';

        function __construct( Database $db )
        {
            $this->db = $db;

        }

        public function createPartner(array $data)
        {
            $query = "INSERT INTO {$this->table} (partner_name, partner_location, partner_state, partner_city, partner_email, partner_mobile, partner_rc_number) VALUES
            (:partner_name, :partner_location, :partner_state, :partner_city, :partner_email, :partner_mobile, :partner_rc_number)";
            $this->db->query($query);
            $this->db->bind(':partner_name', $data['partner_name']);
            $this->db->bind(':partner_location', $data['partner_location']);
            $this->db->bind(':partner_state', $data['partner_state']);
            $this->db->bind(':partner_city', $data['partner_city']);
            $this->db->bind(':partner_email', $data['partner_email']);
            $this->db->bind(':partner_mobile', $data['partner_mobile']);
            $this->db->bind(':partner_rc_number', $data['partner_rc_number']);
            if ($this->db->execute()) {
                return true;
            }
            return false;
        }

        public function getPartners()
        {
            $this->db->query("SELECT * FROM {$this->table}");
            $row = $this->db->resultSet();
            if (!$row) {
                return null;
            }
            return $row;
        }

        public function getPartner(int $id)
        {
            $this->db->query("SELECT * FROM {$this->table} WHERE partner_id = :partner_id");
            $this->db->bind(':partner_id', $id);
            $row = $this->db->single();
            if (!$row) {
                return null;
            }
            return $row;
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

        public function generateUsername(string $name, int $id): string
        {
            $names = explode(' ', $name);
            $username = $names[0] . $names[1];
            $row = $this->getPartner( $id );
            if ( !is_null( $row[ 'username' ] ) ) {
                if (in_array($username, $row['username'])) {
                    $count = 0;
                    while (in_array( ($username. ''. ++$count) , $row['username']) );
                    $username = $username. '' .$count;
                }
            }
            return $username;
        }

        public function createPartner(array $data)
        {
            $query = "INSERT INTO {$this->table} (partner_name, partner_location, partner_state, partner_city, partner_email, partner_mobile, partner_rc_number) VALUES
            (:partner_name, :partner_location, :partner_state, :partner_city, :partner_email, :partner_mobile, :partner_rc_number)";
            $this->db->query($query);
            $this->db->bind(':partner_name', $data['partner_name']);
            $this->db->bind(':partner_location', $data['partner_location']);
            $this->db->bind(':partner_state', $data['partner_state']);
            $this->db->bind(':partner_city', $data['partner_city']);
            $this->db->bind(':partner_email', $data['partner_email']);
            $this->db->bind(':partner_mobile', $data['partner_mobile']);
            $this->db->bind(':partner_rc_number', $data['partner_rc_number']);
            if ($this->db->execute()) {
                return true;
            }
            return false;
        }

        public function getPartners()
        {
            $this->db->query("SELECT * FROM {$this->table}");
            $row = $this->db->resultSet();
            if (!$row) {
                return null;
            }
            return $row;
        }

        public function getPartner(int $id)
        {
            $this->db->query("SELECT * FROM {$this->table} WHERE partner_id = :partner_id");
            $this->db->bind(':partner_id', $id);
            $row = $this->db->single();
            if (!$row) {
                return null;
            }
            return $row;
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

        // public function generateUsername(string $name, int $id): string
        // {
        //     $names = explode(' ', $name);
        //     $username = $names[0] . $names[1];
        //     $row = $this->getPartner( $id );
        //     if ( !is_null( $row[ 'username' ] ) ) {
        //         if (in_array($username, $row['username'])) {
        //             $count = 0;
        //             while (in_array( ($username. ''. ++$count) , $row['username']) );
        //             $username = $username. '' .$count;
        //         }
        //     }
        //     return $username;
        // }
}

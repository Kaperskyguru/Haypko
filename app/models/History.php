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

        public function createHistory(array $data)
        {
            $query = "INSERT INTO {$this->table} (history_name, history_location, history_state, history_city, history_email, history_mobile, history_rc_number) VALUES
            (:history_name, :history_location, :history_state, :history_city, :history_email, :history_mobile, :history_rc_number)";
            $this->db->query($query);
            $this->db->bind(':history_name', $data['name']);
            $this->db->bind(':history_location', $data['address']);
            $this->db->bind(':history_state', $data['state']);
            $this->db->bind(':history_city', $data['city']);
            $this->db->bind(':history_email', $data['email']);
            $this->db->bind(':history_mobile', $data['mobile']);
            $this->db->bind(':history_rc_number', $data['rcnumber']);
            if ($this->db->execute()) {
                return true;
            }
            return false;
        }

        public function getHistories()
        {
            $this->db->query("SELECT * FROM {$this->table}");
            $row = $this->db->resultSet();
            if (!$row) {
                return null;
            }
            return $row;
        }

        public function getHistory(int $id)
        {
            $this->db->query("SELECT * FROM {$this->table} WHERE history_id = :history_id");
            $this->db->bind(':history_id', $id);
            $row = $this->db->single();
            if (!$row) {
                return null;
            }
            return $row;
        }

        public function updateHistory(int $int, array $data)
        {
            $paramsArray = [];
            foreach($data as $key => $value) {
                array_push($paramsArray, $key." = :".$key);
            }
            $params = implode(', ', $paramsArray);
            $this->db->query("UPDATE {$this->table} SET {$params} WHERE history_id = :history_id");
            foreach($data as $column => $value) {
                $this->db->bind(":".$column, $value);
            }
            $this->db->bind(":history_id", $int);
            if(!$this->db->execute()) {
                return false;
            }
            return true;
        }

        public function deleteHistory(int $id) {
            $this->db->query("DELETE FROM {$this->table} WHERE history_id = :history_id");
            $this->db->bind(':history_id', $id);
            if(!$this->db->execute()) {
                return false;
            }
            return true;
        }

        // public function generateUsername(string $name, int $id): string
        // {
        //     $names = explode(' ', $name);
        //     $username = $names[0] . $names[1];
        //     $row = $this->getHistory( $id );
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

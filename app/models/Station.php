<?php
    /**
     *
     */
    class Station
    {
        private $db;
        protected $table = 'stations';

        function __construct(Database $db)
        {
            $this->db = $db;
        }

        public function createStation(array $data)
        {
            $query = "INSERT INTO {$this->table} (station_name, station_location, station_state, station_city, station_email, station_mobile, station_rc_number) VALUES
            (:station_name, :station_location, :station_state, :station_city, :station_email, :station_mobile, :station_rc_number)";
            $this->db->query($query);
            $this->db->bind(':station_name', $data['name']);
            $this->db->bind(':station_location', $data['address']);
            $this->db->bind(':station_state', $data['state']);
            $this->db->bind(':station_city', $data['city']);
            $this->db->bind(':station_email', $data['email']);
            $this->db->bind(':station_mobile', $data['mobile']);
            $this->db->bind(':station_rc_number', $data['rcnumber']);
            if ($this->db->execute()) {
                return true;
            }
            return false;
        }

        public function getStations()
        {
            $this->db->query("SELECT * FROM {$this->table}");
            $row = $this->db->resultSet();
            if (!$row) {
                return null;
            }
            return $row;
        }

        public function getStation(int $id)
        {
            $this->db->query("SELECT * FROM {$this->table} WHERE station_id = :station_id");
            $this->db->bind(':station_id', $id);
            $row = $this->db->single();
            if (!$row) {
                return null;
            }
            return $row;
        }

        public function updateStation(int $int, array $data)
        {
            $paramsArray = [];
            foreach($data as $key => $value) {
                array_push($paramsArray, $key." = :".$key);
            }
            $params = implode(', ', $paramsArray);
            $this->db->query("UPDATE {$this->table} SET {$params} WHERE station_id = :station_id");
            foreach($data as $column => $value) {
                $this->db->bind(":".$column, $value);
            }
            $this->db->bind(":station_id", $int);
            if(!$this->db->execute()) {
                return false;
            }
            return true;
        }

        public function deleteStation(int $id) {
            $this->db->query("DELETE FROM {$this->table} WHERE station_id = :station_id");
            $this->db->bind(':station_id', $id);
            if(!$this->db->execute()) {
                return false;
            }
            return true;
        }

        public function generateUsername(string $name, int $id): string
        {
            $names = explode(' ', $name);
            $username = $names[0] . $names[1];
            $row = $this->getStation( $id );
            if ( !is_null( $row[ 'username' ] ) ) {
                if (in_array($username, $row['username'])) {
                    $count = 0;
                    while (in_array( ($username. ''. ++$count) , $row['username']) );
                    $username = $username. '' .$count;
                }
            }
            return $username;
        }
}

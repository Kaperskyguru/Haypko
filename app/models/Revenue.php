<?php
/**
*
*/
class revenue
{
    private $db;
    protected $table = 'revenues';

    function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function createRevenue(array $data)
    {
        $query = "INSERT INTO {$this->table} (revenue_name, revenue_location, revenue_state, revenue_city, revenue_email, revenue_mobile, revenue_rc_number) VALUES
        (:revenue_name, :revenue_location, :revenue_state, :revenue_city, :revenue_email, :revenue_mobile, :revenue_rc_number)";
        $this->db->query($query);
        $this->db->bind(':revenue_name', $data['name']);
        $this->db->bind(':revenue_location', $data['address']);
        $this->db->bind(':revenue_state', $data['state']);
        $this->db->bind(':revenue_city', $data['city']);
        $this->db->bind(':revenue_email', $data['email']);
        $this->db->bind(':revenue_mobile', $data['mobile']);
        $this->db->bind(':revenue_rc_number', $data['rcnumber']);
        if ($this->db->execute()) {
            return true;
        }
        return false;
    }

    public function getRevenue(int $id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE revenue_id = :revenue_id");
        $this->db->bind(':revenue_id', $id);
        $row = $this->db->single();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function updateRevenue(int $int, array $data)
    {
        $paramsArray = [];
        foreach($data as $key => $value) {
            array_push($paramsArray, $key." = :".$key);
        }
        $params = implode(', ', $paramsArray);
        $this->db->query("UPDATE {$this->table} SET {$params} WHERE revenue_id = :revenue_id");
        foreach($data as $column => $value) {
            $this->db->bind(":".$column, $value);
        }
        $this->db->bind(":revenue_id", $int);
        if(!$this->db->execute()) {
            return false;
        }
        return true;
    }

    public function deleteRevenue(int $id) {
        $this->db->query("DELETE FROM {$this->table} WHERE revenue_id = :revenue_id");
        $this->db->bind(':revenue_id', $id);
        if(!$this->db->execute()) {
            return false;
        }
        return true;
    }

    public function getRevenues()
    {
        $this->db->query("SELECT Petrol, Gas, Diesel, Month FROM revenue");
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function getTotalRevenues()
    {
        $this->db->query("SELECT SUM(Petrol) AS petrol, SUM(Gas) AS gas, SUM(Diesel) AS diesel FROM revenue");
        $row = $this->db->single();
        if (!$row) {
            return null;
        }
        return $row->petrol + $row->diesel + $row->gas;;
    }

    public function getTotalRevenuesByMonth($month)
    {
        $this->db->query("SELECT SUM(Petrol) AS petrol, SUM(Gas) AS gas, SUM(Diesel) AS diesel FROM revenue WHERE Month = :month");
        $this->db->bind(':month', $month);
        $row = $this->db->single();
        if (!$row) {
            return null;
        }
        return ($row->petrol+$row->gas+$row->diesel);
    }


    public function getPartnerTotalRevenues($partner_id)
    {
        $this->db->query("SELECT SUM(Petrol) AS petrol, SUM(Gas) AS gas, SUM(Diesel) AS diesel FROM clientRevenue WHERE partner_id = :id");
        $this->db->bind(':id', $partner_id);
        $row = $this->db->single();
        if (!$row) {
            return null;
        }
        return $row->petrol + $row->diesel + $row->gas;;
    }

    public function getPartnerTotalRevenuesByMonth($month, $partner_id)
    {
        $this->db->query("SELECT SUM(Petrol) AS petrol, SUM(Gas) AS gas, SUM(Diesel) AS diesel FROM clientRevenue WHERE Month = :month AND partner_id = :id");
        $this->db->bind(':month', $month);
        $this->db->bind(':id', $partner_id);
        $row = $this->db->single();
        if (!$row) {
            return null;
        }
        return ($row->petrol+$row->gas+$row->diesel);
    }

}

<?php
/**
*
*/
class Driver
{
    private $db;
    protected $table = 'drivers';

    function __construct( Database $db )
    {
        $this->db = $db;
    }

    public function createDriver(array $data)
    {
        $query = "INSERT INTO {$this->table} (name, partner_id, username, location_id, email, mobile) VALUES
        (:name, :partner_id, :username, :location, :email, :mobile)";
        $this->db->query($query);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':partner_id', $data['partner_id']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':mobile', $data['mobile']);
        if ($this->db->execute()) {
            return $this->db->getLastInsertedID();
        }
        return false;
    }

    public function getDrivers()
    {
        $this->db->query("SELECT id, name, username, location, email, partner_id ,mobile FROM {$this->table} ORDER BY id DESC");
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function getDriversName()
    {
        $this->db->query("SELECT id, name FROM {$this->table} ORDER BY name");
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function getDriver(int $id)
    {
        $this->db->query("SELECT id, name, username, location, email, partner_id, mobile FROM {$this->table} WHERE id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function getDriverPassword($id)
    {
        $this->db->query("SELECT password FROM {$this->table} WHERE id = :user_id");
        $this->db->bind(':user_id', $id);
        $row = $this->db->single();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function updateDriver(int $int, array $data)
    {
        $paramsArray = [];
        foreach($data as $key => $value) {
            array_push($paramsArray, $key." = :".$key);
        }
        $params = implode(', ', $paramsArray);
        $this->db->query("UPDATE {$this->table} SET {$params} WHERE id = :id");
        foreach($data as $column => $value) {
            $this->db->bind(":".$column, $value);
        }
        $this->db->bind(":id", $int);
        if($this->db->execute()) {
            return true;
        }
        return false;
    }

    public function deleteDriver(int $id) {
        $this->db->query("DELETE FROM {$this->table} WHERE id = :id");
        $this->db->bind(':id', $id);
        if(!$this->db->execute()) {
            return false;
        }
        return true;
    }

    public function deleteDrivers($ids) {
        $this->db->query("DELETE FROM {$this->table} WHERE id IN( {$ids} )");
        if(!$this->db->execute()) {
            return false;
        }
        return true;
    }
}

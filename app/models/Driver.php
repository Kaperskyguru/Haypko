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
        $query = "INSERT INTO {$this->table} (name, password, partner_id, admin_id, username, location_id, email, mobile) VALUES
        (:name, :password, :partner_id, :admin_id, :username, :location, :email, :mobile)";
        $this->db->query($query);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':partner_id', $data['partner_id']);
        $this->db->bind(':admin_id', $data['admin_id']);
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
        $this->db->query("SELECT id, name, username, location_id, email, partner_id ,mobile FROM {$this->table} ORDER BY id DESC");
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function getDriversByPartnerId(int $id)
    {
        $this->db->query("SELECT id, name, username, location_id, email, partner_id ,mobile FROM {$this->table} WHERE partner_id = :id ORDER BY id DESC");
        $this->db->bind(':id', $id);
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function getDriversByAdminId(int $id)
    {
        $this->db->query("SELECT id, name, username, location_id, email, partner_id ,mobile FROM {$this->table} WHERE admin_id = :id ORDER BY id DESC");
        $this->db->bind(':id', $id);
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
        $this->db->query("SELECT id, name, username, location_id, email, partner_id, mobile FROM {$this->table} WHERE id = :id");
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

    public function driverLogin( array $data )
    {
        try {
            $query = "SELECT * FROM {$this->table} WHERE username = :user_name";
            $stmt = $this->db->query($query);
            $this->db->bind(":user_name", $data['username']);
            $res = $this->db->single();
            if (password_verify($data['password'], $res->password)) {
                return $res->id;
            }
            return 0;
        } catch (Error $e) {
            $_SESSION['error'] = $e->getMessage();
            return 0;
        }
    }

    public function generateUsername(string $name): string
    {
        //generate username from name
        $names = explode(' ', $name);
        $username = $names[0] . $names[1];
        $rows = $this->getDrivers();
        foreach ($rows as $row) {
            $r[] = $row->username;
        }
        if (in_array($username, $r)) {
            $count = 0;
            while (in_array( ($username. ''. ++$count) , $r) );
            $username = $username. '' .$count;

        }
        return $username;
    }

}

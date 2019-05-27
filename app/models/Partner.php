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
        $query = "INSERT INTO {$this->table} (partner_name, username, password, partner_location, partner_state, partner_city, partner_email, partner_mobile, partner_rc_number, partner_account_number, partner_account_name, partner_bank_name) VALUES
        (:partner_name, :username, :password, :partner_location, :partner_state, :partner_city, :partner_email, :partner_mobile, :partner_rc_number, :partner_account_number, :partner_account_name, :partner_bank_name)";
        $this->db->query($query);
        $this->db->bind(':partner_name', $data['partner_name']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':partner_location', $data['partner_location']);
        $this->db->bind(':partner_state', $data['partner_state']);
        $this->db->bind(':partner_city', $data['partner_city']);
        $this->db->bind(':partner_email', $data['partner_email']);
        $this->db->bind(':partner_mobile', $data['partner_mobile']);
        $this->db->bind(':partner_rc_number', $data['partner_rc_number']);
        $this->db->bind(':partner_account_number', $data['partner_account_number']);
        $this->db->bind(':partner_account_name', $data['partner_account_name']);
        $this->db->bind(':partner_bank_name', $data['partner_bank_name']);
        if ($this->db->execute()) {
            return $this->db->getLastInsertedID();
        }
        return false;
    }

    public function getPartners()
    {
        $this->db->query("SELECT id, partner_name, status, username, partner_location, partner_rc_number, partner_email, partner_state,partner_city,partner_mobile, partner_account_number, partner_account_name, partner_bank_name FROM {$this->table} ORDER BY id DESC");
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function getPartnersName()
    {
        $this->db->query("SELECT id, partner_name, partner_city FROM {$this->table} WHERE status = 1 ORDER BY partner_name");
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function getPartner(int $id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id = :partner_id");
        $this->db->bind(':partner_id', $id);
        $row = $this->db->single();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function getPartnerPassword($id)
    {
        $this->db->query("SELECT password FROM {$this->table} WHERE id = :user_id");
        $this->db->bind(':user_id', $id);
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
        $this->db->query("UPDATE {$this->table} SET {$params} WHERE id = :partner_id");
        foreach($data as $column => $value) {
            $this->db->bind(":".$column, $value);
        }
        $this->db->bind(":partner_id", $int);
        if($this->db->execute()) {
            return true;
        }
        return false;
    }

    public function deletePartner(int $id) {
        $this->db->query("DELETE FROM {$this->table} WHERE id = :partner_id");
        $this->db->bind(':partner_id', $id);
        if(!$this->db->execute()) {
            return false;
        }
        return true;
    }

    public function deletePartners($ids) {
        $this->db->query("DELETE FROM {$this->table} WHERE id IN( {$ids} )");
        if(!$this->db->execute()) {
            return false;
        }
        return true;
    }

    public function generateUsername(string $name): string
    {
        //generate username from name
        $names = explode(' ', $name);
        $username = $names[0] . $names[1];
        $rows = $this->getPartners();
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

    public function getClientRevenues($id)
    {
        $this->db->query("SELECT SUM(Petrol) AS petrol, SUM(Gas) AS gas, SUM(Diesel) AS diesel FROM clientRevenue WHERE partner_id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->resultSet();
        if (!$row) {
            return null;
        }
        return $row;
    }

    public function getClientProductSoldYear($year)
    {
        $query = "SELECT year FROM clientProductSold WHERE year = :year";
        $this->db->query($query);
        $this->db->bind(':year', $year);
        $row = $this->db->single();
        if ($row) {
            return true;
        }
        return false;
    }

    public function getClientProductSoldMonth($month)
    {
        $query = "SELECT month FROM clientProductSold WHERE month = :month";
        $this->db->query($query);
        $this->db->bind(':month', $month);
        $row = $this->db->single();
        if ($row) {
            return true;
        }
        return false;
    }

    public function getClientProductSoldPartnerId($id)
    {
        $query = "SELECT partner_id FROM clientProductSold WHERE partner_id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if ($row) {
            return true;
        }
        return false;
    }


    public function getClientRevenueYear($year)
    {
        $query = "SELECT Year FROM clientRevenue WHERE Year = :year";
        $this->db->query($query);
        $this->db->bind(':year', $year);
        $row = $this->db->single();
        if ($row) {
            return true;
        }
        return false;
    }

    public function getClientRevenueMonth($month)
    {
        $query = "SELECT Month FROM clientRevenue WHERE Month = :month";
        $this->db->query($query);
        $this->db->bind(':month', $month);
        $row = $this->db->single();
        if ($row) {
            return true;
        }
        return false;
    }

    public function getClientRevenuePartnerId($id)
    {
        $query = "SELECT partner_id FROM clientRevenue WHERE partner_id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if ($row) {
            return true;
        }
        return false;
    }

    public function updateClientProductSold($data)
    {

        if ($this->getClientProductSoldYear($data['Year']) && $this->getClientProductSoldPartnerId($data['partner_id']) && $this->getClientProductSoldMonth($data['Month'])) {
            $this->db->query("UPDATE clientProductSold SET {$data['col']} = {$data['col']} + :val WHERE month = :month AND partner_id = :id AND year = :year");
            $this->db->bind(":val", 1);
            $this->db->bind(":month", $data['Month']);
            $this->db->bind(":id", $data['partner_id']);
            $this->db->bind(":year", $data['Year']);
            if(!$this->db->execute()) {
                return false;
            }
            return true;
        } else {
            $query = "INSERT INTO clientProductSold ( {$data['col']}, partner_id, month, year) VALUES ( :col, :partner_id, :month, :year)";
            $this->db->query($query);
            $this->db->bind(':col', 1);
            $this->db->bind(':partner_id', $data['partner_id']);
            $this->db->bind(':month', $data['Month']);
            $this->db->bind(':year', $data['Year']);
            if ($this->db->execute()) {
                return true;
            }
            return false;
        }
    }

    public function updateClientRevenue(array $data)
    {

        if ($this->getClientRevenueYear($data['Year']) && $this->getClientRevenuePartnerId($data['partner_id']) && $this->getClientRevenueMonth($data['Month'])) {
            $this->db->query("UPDATE clientRevenue SET {$data['col']} = {$data['col']} + :amount WHERE Month = :month AND partner_id = :id AND Year = :year");
            $this->db->bind(":amount", $data['amount']);
            $this->db->bind(':id', $data['partner_id']);
            $this->db->bind(":month", $data['Month']);
            $this->db->bind(":year", $data['Year']);
            if(!$this->db->execute()) {
                return false;
            }
            return true;
        } else {
            $query = "INSERT INTO clientRevenue (Gas, Petrol, Diesel, Month, Year, partner_id) VALUES (:Gas, :Petrol, :Diesel, :Month, :Year, :id)";
            $this->db->query($query);
            $this->db->bind(':Gas', $data['Gas']);
            $this->db->bind(':Petrol', $data['Petrol']);
            $this->db->bind(':Diesel', $data['Diesel']);
            $this->db->bind(':Month', $data['Month']);
            $this->db->bind(':Year', $data['Year']);
            $this->db->bind(':id', $data['partner_id']);
            if ($this->db->execute()) {
                return true;
            }
            return false;
        }
    }
    
    public function isEmailExist(string $email)
    {
        $query = "SELECT partner_email FROM {$this->table} WHERE partner_email = :email";
        $this->db->query($query);
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        if ($row) {
            return true;
        }
        return false; 
    }

}

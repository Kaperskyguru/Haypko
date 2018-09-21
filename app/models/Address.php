<?php
/**
*
*/
class Address
{
    private $db;
    protected $table = 'addresses';

    function __construct()
    {
        $this->db = new Database;
    }

    public function createAddress(int $id, string $address)
    {
        $query = "INSERT INTO {$this->table} (address_customer_id, address_text) VALUES (:id, :text)";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->bind(':text', $address);
        if ($this->db->execute()) {
            return $this->db->getLastInsertedID();
        }
        return 0;
    }

    public function getAddressByCustomerId(int $id)
    {
        $this->db->query("SELECT address_text FROM {$this->table} WHERE address_customer_id = :id");
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        if (!$row) {
            return null;
        }
        return $row->address_text;
    }
}

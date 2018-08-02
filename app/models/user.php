<?php
    /**
     *
     */
    class user
    {
        private $db;

        function __construct()
        {
            $this->db = new Database;
        }

        public function login( array $data )
        {
            
        }

        public function storePartner(array $data)
        {
            $query = 'INSERT INTO partners (partner_name, partner_location, partner_state, partner_city, partner_email, partner_mobile, partner_rc_number) VALUES
            (:partner_name, :partner_location, :partner_state, :partner_city, :partner_email, :partner_mobile, :partner_rc_number)';
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
}

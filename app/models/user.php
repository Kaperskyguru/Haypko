<?php
    /**
     *
     */
    class user
    {
        private $db;

        function __construct( Database $db )
        {
            $this->db = $db;
        }

        public function login( array $data )
        {

        }
}

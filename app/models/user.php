<?php
    /**
     *
     */
    class user
    {
        private $db;
        private $table = "users";

        function __construct( Database $db )
        {
            $this->db = $db;
        }

        public function login( array $data )
        {
            try {
                $query = "SELECT * FROM {$data['table']} WHERE username = :user_name";
                $stmt = $this->db->query($query);
                $this->db->bind(":user_name", $data['username']);
                $res = $this->db->single();
                if (password_verify($data['password'], $res->password)) {
                    $_SESSION['user_id'] = $res->id;
                    return true;
                }
                return false;
            } catch (Error $e) {
                $_SESSION['error'] = $e->getMessage();
                return false;
            }
        }

        public function getUser($id)
        {
            $this->db->query("SELECT * FROM {$this->table} WHERE id = :user_id");
            $this->db->bind(':user_id', $id);
            $row = $this->db->single();
            if (!$row) {
                return null;
            }
            return $row;
        }

        public function getUserPassword($id)
        {
            $this->db->query("SELECT password FROM {$this->table} WHERE id = :user_id");
            $this->db->bind(':user_id', $id);
            $row = $this->db->single();
            if (!$row) {
                return null;
            }
            return $row;
        }

        public function update(int $id, array $data)
        {
            $paramsArray = [];
            foreach($data as $key => $value) {
                array_push($paramsArray, $key." = :".$key);
            }
            $params = implode(', ', $paramsArray);
            $this->db->query("UPDATE {$this->table} SET {$params} WHERE id = :user_id");
            foreach($data as $column => $value) {
                $this->db->bind(":".$column, $value);
            }
            $this->db->bind(":user_id", $id);
            if(!$this->db->execute()) {
                return false;
            }
            return true;
        }

        public function storeSession(int $id, $cookie)
        {
            $query = "INSERT INTO sessions (session_cookie, session_user_id, session_start) VALUES (:session_cookie, :session_user_id, NOW())";
            $stmt = $this->db->query($query);
            $this->db->bind(":session_cookie", md5($cookie));
            $this->db->bind(':session_user_id', $id);
            if ($this->db->execute()) {
                return true;
            }
            return false;
        }

        public function deleteSession(int $user_id, string $cookie = null): bool
        {
            try {
                //if cookie is null, then delete all cookies related to the user_id
                if (is_null($cookie) && !is_null($user_id)) {
                    $sql = 'DELETE FROM sessions WHERE session_user_id = :session_user_id';
                    $this->db->query($sql);
                    $this->db->bind(':session_user_id', $user_id);
                    $this->db->execute();
                    return true;
                }

                // if cookie is not null, then delete a specific cookie with user_id
                $sql = "DELETE FROM sessions WHERE (session_cookie = :session_cookie) AND (session_user_id = :session_user_id)";
                $this->db->query($sql);
                $this->db->bind(':session_cookie', $cookie);
                $this->db->bind(':session_user_id', $user_id);
                $this->db->execute();
                return true;
            } catch (Exception $e) {
                echo $e->getMessage();
                return false;
            }
        }

}

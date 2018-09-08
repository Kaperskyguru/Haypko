<?php

class notify
{
    private static $instance;
    private $db;
    public function __construct( Database $db)
    {
        $this->db = $db;
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function Notify(Nofication $notify)
    {
        try {
            // Stores the notif into database by calling... add_notification();
            $id = self::add_notification($notify);

            // Call the get_Notifications_by_user_id() to notify that particular user
            $user_id = $notify->get_notification_user_id();
            self::get_notifications_by_user_id($user_id);

            //Display the notif and increment the number
            self::get_notifications_by_id($id);
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            // parent::logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());

        }
    }

    public function add_notification(array $notif)
    {
        try {
            $query = "INSERT INTO notifications(notif_content, notif_partner_id)"
                . "VALUES(:notification_content, :notification_partner_id)";
            $this->db->query($query);
            $this->db->bind(":notification_content", $notif['content']);
            $this->db->bind(":notification_partner_id", $notif['partner_id']);
            $this->db->execute();
            return $this->db->getLastInsertedID();
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            // $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return 0;
        }
    }

    public function get_notifications_by_user_id($user_id)
    {
        try {
            $query = "SELECT * FROM notifications WHERE notif_partner_id = :user_id ORDER BY notif_date DESC";
            $this->query($query);
            $this->bind(":user_id", $user_id);
            $stmt = $this->single();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            // $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }

    public static function display_notifications()
    {
        $stmt = self::get_notifications_by_user_id();
    }

    public function get_notifications()
    {
        try {
            $query = "SELECT * FROM notifications WHERE notif_status = 1";
            $this->db->query($query);
            $stmt = $this->db->resultSet();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            // $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }

    }

    public function get_notification_by_id($id)
    {
        try {
            $query = "SELECT * FROM notifications WHERE notif_status = 5 AND id = :id";
            $this->db->query($query);
            $this->db->bind(':id', $id);
            $stmt = $this->db->single();
            return $stmt;
        } catch (PDOException $e) {
            $_SESSION['error'] = $e->getMessage();
            // $this->logError($e->getMessage() . ' ==>' . __CLASS__ . '=>' . __FUNCTION__, get_user_uid());
            return null;
        }
    }


}

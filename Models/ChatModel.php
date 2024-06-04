<?php
require '../config.php';
class ChatModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getMessages() {
        $query = "SELECT * FROM messages ORDER BY created_at";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addMessage($sender, $message) {
        $query = "INSERT INTO messages (sender, message) VALUES (:sender, :message)";
        $statement = $this->db->prepare($query);
        $statement->bindValue(':sender', $sender);
        $statement->bindValue(':message', $message);
        $statement->execute();
    }
}

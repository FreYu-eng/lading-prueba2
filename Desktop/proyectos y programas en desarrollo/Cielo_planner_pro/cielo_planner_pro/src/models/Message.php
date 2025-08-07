<?php
class Message {
    private $id;
    private $sender_id;
    private $receiver_id;
    private $content;
    private $timestamp;

    public function __construct($sender_id, $receiver_id, $content) {
        $this->sender_id = $sender_id;
        $this->receiver_id = $receiver_id;
        $this->content = $content;
        $this->timestamp = date("Y-m-d H:i:s");
    }

    public function getId() {
        return $this->id;
    }

    public function getSenderId() {
        return $this->sender_id;
    }

    public function getReceiverId() {
        return $this->receiver_id;
    }

    public function getContent() {
        return $this->content;
    }

    public function getTimestamp() {
        return $this->timestamp;
    }

    public function save($db) {
        $stmt = $db->prepare("INSERT INTO messages (sender_id, receiver_id, content, timestamp) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $this->sender_id, $this->receiver_id, $this->content, $this->timestamp);
        return $stmt->execute();
    }

    public static function getMessagesByUser($db, $user_id) {
        $stmt = $db->prepare("SELECT * FROM messages WHERE sender_id = ? OR receiver_id = ? ORDER BY timestamp DESC");
        $stmt->bind_param("ii", $user_id, $user_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
?>
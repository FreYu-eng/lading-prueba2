<?php
class Donation {
    private $conn;
    private $table_name = "donations";

    public $id;
    public $member_id;
    public $amount;
    public $date;
    public $message;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (member_id, amount, date, message) VALUES (:member_id, :amount, :date, :message)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':member_id', $this->member_id);
        $stmt->bindParam(':amount', $this->amount);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':message', $this->message);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET member_id = :member_id, amount = :amount, date = :date, message = :message WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':member_id', $this->member_id);
        $stmt->bindParam(':amount', $this->amount);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':message', $this->message);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
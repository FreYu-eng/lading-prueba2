<?php
class EventController {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function createEvent($data) {
        // Code to create a new event in the database
        $query = "INSERT INTO events (title, description, date, time, location) VALUES (:title, :description, :date, :time, :location)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':date', $data['date']);
        $stmt->bindParam(':time', $data['time']);
        $stmt->bindParam(':location', $data['location']);
        return $stmt->execute();
    }

    public function updateEvent($id, $data) {
        // Code to update an existing event in the database
        $query = "UPDATE events SET title = :title, description = :description, date = :date, time = :time, location = :location WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':date', $data['date']);
        $stmt->bindParam(':time', $data['time']);
        $stmt->bindParam(':location', $data['location']);
        return $stmt->execute();
    }

    public function deleteEvent($id) {
        // Code to delete an event from the database
        $query = "DELETE FROM events WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getEvents() {
        // Code to retrieve all events from the database
        $query = "SELECT * FROM events ORDER BY date ASC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEvent($id) {
        // Code to retrieve a single event by ID
        $query = "SELECT * FROM events WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
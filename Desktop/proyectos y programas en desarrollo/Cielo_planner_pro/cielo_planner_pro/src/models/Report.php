<?php
class Report {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function generateAttendanceReport($eventId) {
        $query = "SELECT member_id, attendance_status FROM attendance WHERE event_id = :event_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':event_id', $eventId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function generateDonationReport($startDate, $endDate) {
        $query = "SELECT donor_id, amount, donation_date FROM donations WHERE donation_date BETWEEN :start_date AND :end_date";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':start_date', $startDate);
        $stmt->bindParam(':end_date', $endDate);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function generateMemberReport() {
        $query = "SELECT id, name, email, registration_date FROM members";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
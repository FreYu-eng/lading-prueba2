<?php
class ReportController {
    private $reportModel;

    public function __construct($reportModel) {
        $this->reportModel = $reportModel;
    }

    public function generateAttendanceReport($startDate, $endDate) {
        // Logic to generate attendance report
        return $this->reportModel->getAttendanceData($startDate, $endDate);
    }

    public function generateFinancialReport($startDate, $endDate) {
        // Logic to generate financial report
        return $this->reportModel->getFinancialData($startDate, $endDate);
    }

    public function downloadReport($reportData, $reportType) {
        // Logic to download the report as a file
        // This could involve creating a CSV or PDF file
    }

    public function viewReports() {
        // Logic to retrieve and display available reports
        return $this->reportModel->getAllReports();
    }
}
?>
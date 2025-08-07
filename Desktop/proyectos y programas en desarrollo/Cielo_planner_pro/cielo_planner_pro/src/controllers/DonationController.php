<?php
class DonationController {
    private $donationModel;

    public function __construct($donationModel) {
        $this->donationModel = $donationModel;
    }

    public function createDonation($data) {
        // Validate and process donation data
        if ($this->validateDonationData($data)) {
            return $this->donationModel->saveDonation($data);
        }
        return false;
    }

    public function getDonations() {
        return $this->donationModel->fetchAllDonations();
    }

    public function getDonationById($id) {
        return $this->donationModel->fetchDonationById($id);
    }

    public function updateDonation($id, $data) {
        if ($this->validateDonationData($data)) {
            return $this->donationModel->updateDonation($id, $data);
        }
        return false;
    }

    public function deleteDonation($id) {
        return $this->donationModel->removeDonation($id);
    }

    private function validateDonationData($data) {
        // Implement validation logic for donation data
        return isset($data['amount']) && isset($data['donor_name']);
    }
}
?>
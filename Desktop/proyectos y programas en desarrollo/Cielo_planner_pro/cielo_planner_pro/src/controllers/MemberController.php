<?php
class MemberController {
    private $memberModel;

    public function __construct($memberModel) {
        $this->memberModel = $memberModel;
    }

    public function registerMember($data) {
        // Validate and register a new member
        if ($this->validateMemberData($data)) {
            return $this->memberModel->create($data);
        }
        return false;
    }

    public function updateMember($id, $data) {
        // Update member information
        if ($this->memberModel->exists($id)) {
            return $this->memberModel->update($id, $data);
        }
        return false;
    }

    public function deleteMember($id) {
        // Delete a member
        if ($this->memberModel->exists($id)) {
            return $this->memberModel->delete($id);
        }
        return false;
    }

    public function getMember($id) {
        // Retrieve member information
        return $this->memberModel->find($id);
    }

    public function listMembers() {
        // List all members
        return $this->memberModel->all();
    }

    private function validateMemberData($data) {
        // Perform validation on member data
        // Example: Check required fields, format, etc.
        return isset($data['name']) && isset($data['email']);
    }
}
?>
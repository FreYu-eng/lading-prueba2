<?php
class MediaController {
    private $mediaModel;

    public function __construct($mediaModel) {
        $this->mediaModel = $mediaModel;
    }

    public function uploadMedia($file) {
        // Logic for uploading media files
        // Validate file type and size
        // Move uploaded file to the designated directory
        // Save media information to the database
    }

    public function getMediaList() {
        // Logic for retrieving the list of media resources
        return $this->mediaModel->fetchAll();
    }

    public function deleteMedia($mediaId) {
        // Logic for deleting a media resource
        // Remove file from the server
        // Delete media record from the database
    }

    public function getMediaById($mediaId) {
        // Logic for retrieving a specific media resource by ID
        return $this->mediaModel->fetchById($mediaId);
    }
}
?>
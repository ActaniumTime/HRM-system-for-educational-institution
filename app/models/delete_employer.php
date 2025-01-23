<?php
require_once 'database_connection.php'; // Ensure the database connection is included

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employerID = $_POST['employerID'];

    if (!empty($employerID)) {
        $employer = new Employer($connection);
        try {
            $employer->deleteEmployer($employerID);
            echo json_encode(['status' => 'success', 'message' => 'Employer deleted successfully.']);
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete employer.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid employer ID.']);
    }
}
?>

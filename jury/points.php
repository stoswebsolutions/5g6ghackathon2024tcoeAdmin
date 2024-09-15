<?php
date_default_timezone_set('Asia/Kolkata');
// Check connection
include '../db_connect.php';

// Get form data
$juryId = $_POST['juryId'];
$participantId = $_POST['participantId'];
$uniqueApplicant = $_POST['uniqueApplicant'];
$criteria1 = $_POST['criteria1'];
$criteria2 = $_POST['criteria2'];
$criteria3 = $_POST['criteria3'];
$criteria4 = $_POST['criteria4'];
$criteria5 = $_POST['criteria5'];
$totalPoints = $criteria1 + $criteria2 + $criteria3 + $criteria4 + $criteria5;
$status = $_POST['status'];
$comments = $_POST['comments'];
$createAt = date("Y-m-d H:i:s");

try {
    $sql = "INSERT INTO points (juryId, participantId, uniqueApplicant, criteria1, criteria2, criteria3, criteria4, criteria5, totalPoints, status, comments, createAt) 
        VALUES ('$juryId', '$participantId', '$uniqueApplicant', '$criteria1', '$criteria2', '$criteria3', '$criteria4', '$criteria5', '$totalPoints', '$status', '$comments', '$createAt')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Marks Submited...');</script>";
    } else {
        echo "<script>alert('Error:" . $conn->error . "');</script>";
    }
} catch (Exception $e) {
    echo "<script>alert('Exception:" . $e . "');</script>";
}
echo "<script> window.location.href='jury/applications';</script>";

$conn->close();

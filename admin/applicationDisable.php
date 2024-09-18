<?php
session_start();
include '../db_connect.php';
if (!isset($_SESSION['adminId'])) {
    header("Location: ../home");
    exit();
}
$adminId = $_SESSION['adminId'];
$status = $_POST['status'];
$uniqueApplicant = $_POST['uniqueApplicant'];
if (!empty($status) && !empty($uniqueApplicant)) {
    $sql = "UPDATE applicant SET status = '$status' WHERE uniqueApplicant = '$uniqueApplicant' ";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Applicants Status Changed successfully!');</script>";
    }
} else {
    echo "<script>alert('Please select and provide valid inputs.');</script>";
}
echo "<script> window.location.href='applications';</script>";
$conn->close();

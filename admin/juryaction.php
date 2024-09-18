<?php
session_start();
include '../db_connect.php';
if (!isset($_SESSION['adminId'])) {
    header("Location: ../home");
    exit();
}
$adminId = $_SESSION['adminId'];
$juryId = $_POST['juryId'];
$uniqueApplicants = $_POST['uniqueApplicant'];
$uniqueApplicants1 = $_POST['uniqueApplicant1'];
if (!empty($juryId) && !empty($uniqueApplicants) && is_array($uniqueApplicants)) {
    $complete1 = [];
    $complete2 = [];
    $complete3 = [];
    foreach ($uniqueApplicants as $uniqueApplicant) {
        $sql = "UPDATE applicant SET assignedJury = '$juryId' WHERE uniqueApplicant = '$uniqueApplicant' ";
        if ($conn->query($sql) === TRUE) {
            $complete1[] = $uniqueApplicant;
        } else {
            $complete2[] = $uniqueApplicant;
        }
    }
    foreach ($uniqueApplicants1 as $uniqueApplicant1) {
        $sql1 = "UPDATE applicant SET assignedJury = '0' WHERE uniqueApplicant = '$uniqueApplicant1' ";
        if ($conn->query($sql1) === TRUE) {
            $complete3[] = $uniqueApplicant1;
        }
    }
    echo "<script>alert('Applicants Assigned successfully!');</script>";
    // echo "<script>alert('Applicants Assigned Failed!');</script>";
} else {
    echo "<script>alert('Please select at least one applicant and provide valid inputs.');</script>";
}
echo "<script> window.location.href='juryassign';</script>";
$conn->close();

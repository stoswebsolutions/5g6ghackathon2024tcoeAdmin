<?php
session_start();

// Include the database connection file
include 'db_connect.php';

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare SQL statement to prevent SQL injection
$sql = $conn->prepare("SELECT uniqueId, password FROM users WHERE email = ? and role='jury' ");
$sql->bind_param("s", $email);
$sql->execute();
$sql->store_result();

if ($sql->num_rows > 0) {
    $sql->bind_result($uniqueId, $hashed_password);
    $sql->fetch();

    // Verify password
    if (password_verify($password, $hashed_password)) {
        // Password is correct, start a session
        $_SESSION['juryId'] = $uniqueId;
        echo "<script>alert('Login successful! Welcome,');</script>";
        echo "<script> window.location.href='jury/applications';</script>";
    } else {
        echo "<script>alert('Invalid email or password!');</script>";
        echo "<script> window.location.href='home#authModal1';</script>";
    }
} else {
    echo "<script>alert('Invalid email or password!');</script>";
    echo "<script> window.location.href='home#authModal1';</script>";
}
$sql->close();
$conn->close();

<?php
session_start();

// Include the database connection file
include 'db_connect.php';

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Prepare SQL statement to prevent SQL injection
$sql = $conn->prepare("SELECT tecUnique, password, tecGroup FROM tecDetails WHERE emailId = ? and status=1 ");
$sql->bind_param("s", $email);
$sql->execute();
$sql->store_result();

if ($sql->num_rows > 0) {
    $sql->bind_result($tecUnique, $hashed_password, $tecGroup);
    $sql->fetch();

    // Verify password
    if (password_verify($password, $hashed_password)) {
        // Password is correct, start a session
        $_SESSION['tecUnique'] = $tecUnique;
        $_SESSION['tecGroup'] = $tecGroup;
        echo "<script>alert('Login successful! Welcome,');</script>";
        echo "<script> window.location.href='tec/applications';</script>";
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

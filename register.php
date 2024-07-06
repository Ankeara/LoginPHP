<?php 
session_start();
include("db.php");



if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $password = md5($password);

    // Check for duplicates
    $sql = "SELECT * FROM testing WHERE email = '$email' AND name = '$name' AND password = '$password'";
    $sqlQuery = mysqli_query($conn, $sql);

    if (mysqli_num_rows($sqlQuery) > 0) {
        // Redirect to the registration page with duplicate warning
        header("Location: authregister.php?register=duplicate");
    } else {
        // Insert new user
        $insert = "INSERT INTO testing(email, name, password) VALUES('$email', '$name', '$password')";
        $insertQuery = mysqli_query($conn, $insert);
        header("Location: authlogin.php?register=success");
    }
}
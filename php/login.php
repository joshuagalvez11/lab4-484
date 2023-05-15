<?php

// Get the email and password from the form submission
$email = $_POST['l_email'];
$login_password = $_POST['l_pass'];

// echo $email, $password;

// Validate the email
if (!preg_match("/^[A-Za-z0-9_!#$%&'*+\/=?`{|}~^.-]+@[A-Za-z0-9.-]+$/", $email)) {
    // If the email is invalid, inform the user with an error message
    echo "Invalid email";
    exit();
}


$servername = "db";
$username = "lamp_demo";
$password = "password";
$dbname = "lamp_demo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the database for the user
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 0) {
    // If the email is not found, inform the user with an error message
    echo "Email not found";
    exit();
}

// Check if the password matches
$row = $result->fetch_assoc();
if ($login_password != $row['password']) {
    // If the password is incorrect, inform the user with an error message
    echo "Incorrect password";
    exit();
} else {

    // If the email and password match, load the form.html page
    header("Location: ../html/form.html");
    exit();

    // Close the database connection
    $stmt->close();
    $conn->close();
}

<?php
    // Get the email and password from the form submission
    $email = $_POST['r_email'];
    $register_password = $_POST['r_p1'];
    $repassword = $_POST['r_p2'];

    $passwordHash = password_hash($register_password, PASSWORD_DEFAULT);


    // Validate the email
    if (!preg_match("/^[A-Za-z0-9_!#$%&'*+\/=?`{|}~^.-]+@[A-Za-z0-9.-]+$/", $email)) {
        // If the email is invalid, inform the user with an error message
        echo "Invalid email";
        exit();
    }

    // Validate the password
    if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/", $register_password)) {
        // If the password is invalid, inform the user with an error message
        echo "Invalid password";
        exit();
    }

    // Validate the password
    if ($register_password !== $repassword) {
        // If the password is invalid, inform the user with an error message
        echo "Password Not Match!";
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

    // Prepare and execute the SQL statement to check if the email is already in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Get the result of the SQL statement
    $result = $stmt->get_result();

    // If the email is already in the database, inform the user with an error message
    if ($result->num_rows > 0) {
        echo "Email already in use";
        exit();
    }
    

    // If the email is not in the database, add a new row to the users table
    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $passwordHash);
    $stmt->execute();

    // Close the database connection
    $conn->close();

    // If the email and password match, load the form.html page
    header("Location: ../index.html");
    exit();
?>
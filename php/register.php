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

    // $sql = $conn->prepare("INSERT INTO users (email, password) VALUES ('$email', '$register_password')");
    // //$sql->bind_param("ss", $email, $register_password);
    // if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    // //header("Location: ./html/form.html");
    // } else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    // // header("Location: ./html/about-me.html");
    // //header("Location: ./html/form.html");
    // }

    $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $repassword);
    $stmt->execute();

    $conn->close();

    header("Location: ../../html/about-me.html");
?>
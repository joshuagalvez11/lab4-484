<?php


// Get the title, content, and email from the form submission
$taskname = $_POST['name'];
$taskdate = $_POST['date'];
$postText = $_POST['post'];
$name = "Joshua Galvez";
$studentID = "200579099";
$major = "Computer Science";
$email = "joshua@email.com";



// Validate the form data
if (empty($name) || empty($studentID) || empty($major) || empty($taskname) || empty($taskdate) || empty($postText)) {
  // Handle the error (e.g. show an error message)
  exit("Error: All fields are required");
}

// Connect to the database
$servername = "db";
$username = "lamp_demo";
$password = "password";
$dbname = "lamp_demo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL statement to insert a new post
$stmt = $conn->prepare("INSERT INTO posts (email, name, studentID, major, taskname, taskDate, postText) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $email, $name, $studentID, $major, $taskname, $taskdate, $postText);
$stmt->execute();


// Close the database connection and the session
$stmt->close();
$conn->close();


header("Location: ../html/blog.html");
exit();

echo "Post created successfully";

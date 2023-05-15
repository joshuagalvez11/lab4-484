<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/lab4.css">
</head>
<body>
    <body>
        <nav>
            <table id="navTable">
                <tr>
                <td class="linked"><a href="./about-me.html">About Me</a></td>
                <td class="linked"><a href="./form.html">Post</a></td>
                <td class="linked"><a href="./blog.php">Blog</a></td>
                <td class="empty"><a> </a></td>
                <td class="empty"><a> </a></td>
                <td class="empty"><a> </a></td>
                <td class="empty"><a> </a></td>
                <td class="empty"><a> </a></td>
                <td class="empty"><a> </a></td>
                <td class="empty"><a> </a></td>
                <td class="empty"><a> </a></td>
                <td class="linked"><a href="../../index.php">Login/Register</a></td>
            </tr>
            </table>
        </nav>
    <h1>Blog</h1>

    <ul id="post-ul">
        <?php

    // Connect to the database
    $servername = "db";
    $username = "lamp_demo";
    $password = "password";
    $dbname = "lamp_demo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }



    // Retrieve all posts from the database
    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);

    // Generate the HTML table rows for the posts
    if ($result->num_rows > 0) {
      echo '<table class="my_table">';
      echo '<tr><th>Email</th><th>Name</th><th>Student ID</th><th>Major</th><th>Task Name</th><th>Task Date</th><th>Post Text</th></tr>';
      while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row["email"] . '</td>';
        echo '<td>' . $row["name"] . '</td>';
        echo '<td>' . $row["studentID"] . '</td>';
        echo '<td>' . $row["major"] . '</td>';
        echo '<td>' . $row["taskName"] . '</td>';
        echo '<td>' . $row["taskDate"] . '</td>';
        echo '<td>' . $row["postText"] . '</td>';
        echo '</tr>';
      }
      echo '</table>';
    } else {
      echo 'No posts found.';
    }

    // Close the database connection
    $conn->close();
    ?>
    </ul>
</body>
<script src="../js/blog.js"></script>
</html>
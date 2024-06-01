<?php
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "auth"; 

// Initialize the connection variable
$conn = null;

// Form submission and database interaction logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Database connected successfully.<br>";
    }



    // Prepare and bind
    $stmt = $conn->prepare("SELECT * FROM login WHERE name = ? AND email = ? AND password = ?");
    if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($conn->error));
    }

    $stmt->bind_param("sss", $name, $email, $password);

    // Execute statement
    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 1) {
      
            exit();
        } else {
            
            header("Location: section/sectionOne.html");
        }
    } else {
        echo "Error executing query: " . htmlspecialchars($stmt->error);
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WiseUp</title>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400..800&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="left_side">
      <div class="logo">
        <div class="top_icon">
          <img src="./Frame.png" alt="">
        </div>
        <h1>WiseUp</h1>
      </div>
    </div>
    <div class="right_side">
      <div class="form-container">
        <h2>Log In</h2>
        <p>Welcome to our platform</p>
        <form action="index.php" method="POST" id="loginForm">
          <input type="text" id="name" name="name" placeholder="Your name" required>
          <input type="email" id="email" name="email" placeholder="Your email" required>
          <input type="password" id="password" name="password" placeholder="Password" required>
          <button type="submit" class="btn">Get started</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

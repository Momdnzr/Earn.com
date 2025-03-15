<?php
  // PHP code for processing form data
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";  // Replace with your database server hostname
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password
    $dbname = "earn";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Create table if not exists
    $tableSql = "CREATE TABLE IF NOT EXISTS form (
      id INT AUTO_INCREMENT PRIMARY KEY,
      full_name VARCHAR(50),
      email VARCHAR(50),
      whatsapp VARCHAR(15),
      job VARCHAR(50)
    )";
    if ($conn->query($tableSql) === TRUE) {
      // echo "Table created successfully\n";
    } else {
      echo "Error creating table: " . $conn->error;
    }

    // Get form data
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $whatsapp = $_POST['whatsapp'];
    $job = $_POST['job'];

    // Insert data into the table
    $insertSql = "INSERT INTO form (full_name, email, whatsapp, job) VALUES ('$full_name', '$email', '$whatsapp', '$job')";
    if ($conn->query($insertSql) === TRUE) {
      // Redirect to the massage.html page
      header("Location: http://localhost/day/massage.html");
      exit(); // Ensure that script execution stops after redirection
    } else {
      echo "Error inserting data: " . $conn->error;
    }

    // Close connection
    $conn->close();
  }
?>

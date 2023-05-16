<?php
// Define the database connection details
$servername = "aws.connect.psdb.cloud"; // Replace with your server name
$username = "zdpa2qu1uriqm4c2zg1h"; // Replace with your database username
$password = "pscale_pw_unIJPdV9O9pO4ZlL1kDYnD7Fc8f70Cddl8CVwAncr0x"; // Replace with your database password
$dbname = "pictures"; // Replace with your database name

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check for errors
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement to insert the picture and description into the database
$stmt = $conn->prepare("INSERT INTO pictures (picture, description) VALUES (?, ?)");

// Bind the parameters to the statement
$stmt->bind_param("ss", $picture, $description);

// Retrieve the picture and description from the form data
$picture = $_FILES["picture"]["name"];
$description = $_POST["description"];

// Execute the statement and check for errors
if ($stmt->execute()) {
  echo "Picture uploaded successfully!";
} else {
  echo "Error uploading picture: " . $conn->error;
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>

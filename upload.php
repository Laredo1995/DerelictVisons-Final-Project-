<?php
// Connect to the database
$servername = "Pablos_Laptop";
$username = "root";
$password = "L@r3do10";
$dbname = "pictures_dv";
$conn = mysqli_connect($Pablos_Laptop, $root, $L@r3do10, $pictures_dv);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Upload the image
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["picture"]["name"]);
move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);

// Insert the image and description into the database
$image = mysqli_real_escape_string($conn, $target_file);
$description = mysqli_real_escape_string($conn, $_POST["description"]);
$sql = "INSERT INTO images (image, description) VALUES ('$image', '$description')";
if (mysqli_query($conn, $sql)) {
  echo "Image uploaded successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>

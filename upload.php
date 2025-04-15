
<?php
$conn = new mysqli("localhost", "root", "", "nestcard");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (isset($_POST["submit"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $image = $_FILES["profile_image"]["name"];
  $tmp = $_FILES["profile_image"]["tmp_name"];
  $folder = "uploads/" . $image;

  if (move_uploaded_file($tmp, $folder)) {
    $stmt = $conn->prepare("INSERT INTO users (name, email, image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $image);
    $stmt->execute();
    header("Location: view.php");
  } else {
    echo "Failed to upload image.";
  }
}
?>

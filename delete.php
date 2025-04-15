
<?php
$conn = new mysqli("localhost", "root", "", "nestcard");
$id = $_GET['id'];
$conn->query("DELETE FROM users WHERE id=$id");
header("Location: view.php");
?>

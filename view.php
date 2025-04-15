
<?php
$conn = new mysqli("localhost", "root", "", "nestcard");
$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
  <title>View NestCard Users</title>
  <style>
    body { font-family: Arial; padding: 20px; background: #f7f7f7; }
    table { width: 100%; border-collapse: collapse; background: white; }
    th, td { padding: 10px; border: 1px solid #ddd; text-align: center; }
    img { width: 60px; border-radius: 50%; }
    a { color: red; text-decoration: none; }
  </style>
</head>
<body>
  <h2>NestCard User Profiles</h2>
  <table>
    <tr><th>Name</th><th>Email</th><th>Profile Image</th><th>Action</th></tr>
    <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><img src="uploads/<?= $row['image'] ?>" alt="Profile"></td>
        <td><a href="delete.php?id=<?= $row['id'] ?>">Delete</a></td>
      </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>

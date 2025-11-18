<?php
$id = $_GET['id'];
$conn = new mysqli("localhost", "root", "", "db_blog");
$sql = "DELETE FROM posts WHERE id=$id";
$conn->query($sql);
header("Location: index.php");
$conn->close();
?>
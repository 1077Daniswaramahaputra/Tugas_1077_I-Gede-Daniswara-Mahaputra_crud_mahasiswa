<?php
include 'config.php';
if(!isset($_SESSION['username'])){
  header("Location: login.php");
  exit();
}
$id = $_GET['id'];
$conn->query("DELETE FROM mahasiswa WHERE id=$id");
header("Location: index.php");
?>
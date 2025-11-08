<?php
include 'config.php';
$message = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
  $stmt->bind_param("ss", $username, $password);
  if($stmt->execute()){
    header("Location: login.php");
  } else {
    $message = "Gagal mendaftar!";
  }
}
include 'includes/header.php';
?>
<h2>Register</h2>
<p class="text-danger"><?= $message ?></p>
<form method="POST">
  <div class="mb-3">
    <label>Username</label>
    <input type="text" name="username" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-success">Register</button>
  <a href="login.php" class="btn btn-link">Login</a>
</form>
<?php include 'includes/footer.php'; ?>
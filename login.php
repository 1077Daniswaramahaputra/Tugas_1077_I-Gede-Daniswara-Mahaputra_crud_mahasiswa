<?php
include 'config.php';
$message = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $result = $stmt->get_result();
  if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    if(password_verify($password, $row['password'])){
      $_SESSION['username'] = $username;
      header("Location: index.php");
      exit();
    } else {
      $message = "Password salah!";
    }
  } else {
    $message = "Username tidak ditemukan!";
  }
}
include 'includes/header.php';
?>
<h2>Login</h2>
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
  <button type="submit" class="btn btn-primary">Login</button>
  <a href="register.php" class="btn btn-link">Daftar</a>
</form>
<?php include 'includes/footer.php'; ?>
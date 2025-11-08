<?php
include 'config.php';
if(!isset($_SESSION['username'])){
  header("Location: login.php");
  exit();
}
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM mahasiswa WHERE id=$id");
$data = $result->fetch_assoc();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $nama = $_POST['nama'];
  $nim = $_POST['nim'];
  $angkatan = $_POST['angkatan'];
  $kelas = $_POST['kelas'];
  $stmt = $conn->prepare("UPDATE mahasiswa SET nama=?, nim=?, angkatan=?, kelas=? WHERE id=?");
  $stmt->bind_param("ssisi", $nama, $nim, $angkatan, $kelas, $id);
  $stmt->execute();
  header("Location: index.php");
}
include 'includes/header.php';
?>
<h2>Edit Mahasiswa</h2>
<form method="POST">
  <div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
  </div>
  <div class="mb-3">
    <label>NIM</label>
    <input type="text" name="nim" class="form-control" value="<?= $data['nim'] ?>" required>
  </div>
  <div class="mb-3">
    <label>Angkatan</label>
    <input type="number" name="angkatan" class="form-control" value="<?= $data['angkatan'] ?>" required>
  </div>
  <div class="mb-3">
    <label>Kelas</label>
    <input type="text" name="kelas" class="form-control" value="<?= $data['kelas'] ?>" required>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
  <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>
<?php include 'includes/footer.php'; ?>
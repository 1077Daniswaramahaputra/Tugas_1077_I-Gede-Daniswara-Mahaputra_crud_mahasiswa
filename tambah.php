<?php
include 'config.php';
if(!isset($_SESSION['username'])){
  header("Location: login.php");
  exit();
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $nama = $_POST['nama'];
  $nim = $_POST['nim'];
  $angkatan = $_POST['angkatan'];
  $kelas = $_POST['kelas'];
  $stmt = $conn->prepare("INSERT INTO mahasiswa (nama, nim, angkatan, kelas) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssis", $nama, $nim, $angkatan, $kelas);
  $stmt->execute();
  header("Location: index.php");
}
include 'includes/header.php';
?>
<h2>Tambah Mahasiswa</h2>
<form method="POST">
  <div class="mb-3">
    <label>Nama</label>
    <input type="text" name="nama" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>NIM</label>
    <input type="text" name="nim" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Angkatan</label>
    <input type="number" name="angkatan" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Kelas</label>
    <input type="text" name="kelas" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-success">Simpan</button>
  <a href="index.php" class="btn btn-secondary">Kembali</a>
</form>
<?php include 'includes/footer.php'; ?>
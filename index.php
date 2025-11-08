<?php
include 'config.php';
if(!isset($_SESSION['username'])){
  header("Location: login.php");
  exit();
}
$result = $conn->query("SELECT * FROM mahasiswa ORDER BY nama ASC");
include 'includes/header.php';
?>
<h2>Daftar Mahasiswa</h2>
<a href="tambah.php" class="btn btn-primary mb-3">Tambah Data</a>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>Nama</th>
      <th>NIM</th>
      <th>Angkatan</th>
      <th>Kelas</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php if($result->num_rows > 0): ?>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($row['nama']) ?></td>
          <td><?= htmlspecialchars($row['nim']) ?></td>
          <td><?= htmlspecialchars($row['angkatan']) ?></td>
          <td><?= htmlspecialchars($row['kelas']) ?></td>
          <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
          </td>
        </tr>
      <?php endwhile; ?>
    <?php else: ?>
      <tr><td colspan="5" class="text-center">Belum ada data</td></tr>
    <?php endif; ?>
  </tbody>
</table>
<?php include 'includes/footer.php'; ?>
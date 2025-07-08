<?php
include 'koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM warga WHERE id=$id");
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Warga</title>
</head>
<body>
    <h2>Edit Data Warga</h2>
    <form method="POST">
        <input type="text" name="nama_lengkap" value="<?= $data['nama_lengkap'] ?>" required><br>
        <input type="text" name="nomor_kk" value="<?= $data['nomor_kk'] ?>" required><br>
        <input type="text" name="nik" value="<?= $data['nik'] ?>" required><br>
        <textarea name="alamat" required><?= $data['alamat'] ?></textarea><br>
        <select name="status" required>
            <option value="Kepala Keluarga" <?= $data['status'] == 'Kepala Keluarga' ? 'selected' : '' ?>>Kepala Keluarga</option>
            <option value="Anggota Keluarga" <?= $data['status'] == 'Anggota Keluarga' ? 'selected' : '' ?>>Anggota Keluarga</option>
        </select><br><br>
        <input type="submit" name="update" value="Simpan Perubahan">
    </form>

    <?php
    if (isset($_POST['update'])) {
        $nama = $_POST['nama_lengkap'];
        $kk = $_POST['nomor_kk'];
        $nik = $_POST['nik'];
        $alamat = $_POST['alamat'];
        $status = $_POST['status'];

        $sql = "UPDATE warga SET 
                    nama_lengkap='$nama', 
                    nomor_kk='$kk', 
                    nik='$nik', 
                    alamat='$alamat', 
                    status='$status' 
                WHERE id=$id";
        mysqli_query($conn, $sql);
        header("Location: index.php");
    }
    ?>
</body>
</html>

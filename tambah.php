<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Warga</title>
</head>
<body>
    <h2>Tambah Data Warga</h2>
    <form method="POST">
        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required><br>
        <input type="text" name="nomor_kk" placeholder="Nomor KK" required><br>
        <input type="text" name="nik" placeholder="NIK" required><br>
        <textarea name="alamat" placeholder="Alamat" required></textarea><br>
        <select name="status" required>
            <option value="">--Pilih Status--</option>
            <option value="Kepala Keluarga">Kepala Keluarga</option>
            <option value="Anggota Keluarga">Anggota Keluarga</option>
        </select><br><br>
        <input type="submit" name="simpan" value="Simpan">
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $nama = $_POST['nama_lengkap'];
        $kk = $_POST['nomor_kk'];
        $nik = $_POST['nik'];
        $alamat = $_POST['alamat'];
        $status = $_POST['status'];

        $sql = "INSERT INTO warga (nama_lengkap, nomor_kk, nik, alamat, status) 
                VALUES ('$nama', '$kk', '$nik', '$alamat', '$status')";
        mysqli_query($conn, $sql);
        header("Location: index.php");
    }
    ?>
</body>
</html>

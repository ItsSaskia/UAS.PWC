<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Warga RT</title>
</head>
<body>
    <h2>Daftar Warga RT</h2>
    <form method="GET" action="">
        <input type="text" name="cari" placeholder="Cari nama..." />
        <input type="submit" value="Cari" />
    </form>
    <a href="tambah.php">Tambah Warga</a><br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>No</th><th>Nama</th><th>No KK</th><th>NIK</th><th>Alamat</th><th>Status</th><th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        $query = "SELECT * FROM warga";
        if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
            $query .= " WHERE nama_lengkap LIKE '%$cari%'";
        }
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>$no</td>
                <td>{$row['nama_lengkap']}</td>
                <td>{$row['nomor_kk']}</td>
                <td>{$row['nik']}</td>
                <td>{$row['alamat']}</td>
                <td>{$row['status']}</td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a> | 
                    <a href='hapus.php?id={$row['id']}' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
                </td>
            </tr>";
            $no++;
        }
        ?>
    </table>
</body>
</html>

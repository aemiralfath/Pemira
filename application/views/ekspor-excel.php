<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pegawai.xls");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemilih</title>
</head>
<body>
    <center><h3>Daftar Pemilih yang Belum Memilih</h3></center>

    <table>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Angkatan</th>
        </tr>
        <?php $no = 0; foreach ($pemilih as $plh) { ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $plh->nim ?></td>
            <td><?= $plh->nama ?></td>
            <td><?= $plh->nama_jurusan ?></td>
            <td><?= $plh->angkatan ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Rekap Akhir Pemilihan Fasilkom.xls");
?>
<html xmlns:x="urn:schemas-microsoft-com:office:excel">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!--[if gte mso 9]>
    <xml>
        <x:ExcelWorkbook>
            <x:ExcelWorksheets>
                <x:ExcelWorksheet>
                    <x:Name>Sheet 1</x:Name>
                    <x:WorksheetOptions>
                        <x:Print>
                            <x:ValidPrinterInfo/>
                        </x:Print>
                    </x:WorksheetOptions>
                </x:ExcelWorksheet>
            </x:ExcelWorksheets>
        </x:ExcelWorkbook>
    </xml>
    <![endif]-->
</head>

<body>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>Angkatan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0;
            foreach ($pemilih as $plh) { ?>
                <tr>
                    <td><?= ++$no ?></td>
                    <td><?= "`" . $plh->nim ?></td>
                    <td><?= $plh->nama ?></td>
                    <td><?php if ($plh->jenis_kelamin == 1) {
                            echo "Laki - Laki";
                        } elseif ($plh->jenis_kelamin == 2) {
                            echo "Perempuan";
                        } else {
                            echo "";
                        } ?></td>
                    <td><?= $plh->nama_jurusan ?></td>
                    <td><?= $plh->angkatan ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
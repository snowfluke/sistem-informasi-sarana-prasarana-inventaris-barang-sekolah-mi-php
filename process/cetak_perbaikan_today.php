<?php
// session_start();
include ('../config/conn.php');
include ('../config/function.php');
?>
<html>

<head>
    <style>
    h2 {
        padding: 0px;
        margin: 0px;
        font-size: 14pt;
    }

    h4 {
        font-size: 12pt;
    }

    text {
        padding: 0px;
    }

    table {
        border-collapse: collapse;
        border: 1px solid #000;
        font-size: 11pt;
    }

    th,
    td {
        border: 1px solid #000;
        padding: 5px;
    }

    table.tab {
        table-layout: auto;
        width: 100%;
    }
    </style>
    <title>Cetak Laporan Reparasi Hari Ini</title>
</head>

<body>
    <?php
    $now = date('Y-m-d');
    $query = mysqli_query($con,"SELECT x.*, x1.nama_kerusakan, x1.harga_perbaikan, x2.nama FROM tb_perbaikan x JOIN tb_jenis_kerusakan x1 ON x1.id_kerusakan = x.id_kerusakan JOIN tb_kasir x2 ON x2.id_kasir = x.id_kasir WHERE x.tanggal='$now' ORDER BY x.tanggal ASC")or die(mysqli_error($con));
    
    ?>
    <div style="page-break-after:always;text-align:center;margin-top:5%;">
        <div style="line-height:5px;">
            <h2>LAPORAN REPARASI SELESAI TERAPI PONSEL</h2>
            <h4>SEMUA REPARASI HARI INI</h4>
        </div>
        <hr style="border-color:black;">
        <table class="tab">
            <tr>
                <th width="20">NO</th>
                <th>TGL</th>
                <th>KERUSAKAN</th>
                <th>MERK</th>
                <th>PEMILIK</th>
                <th>KASIR</th>
                <th>BIAYA</th>
            </tr>
            <?php $n=1; $total=0; while($row = mysqli_fetch_array($query)): ?>
            <tr>
                <td align="center"><?= $n++.'.'; ?></td>
                <td><?= date('d-m-Y',strtotime($row['tanggal'])); ?></td>
                <td><?= $row['nama_kerusakan']; ?></td>
                <td><?= $row['merk_seri_hp']; ?></td>
                <td><?= $row['nama_pelanggan']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['harga_perbaikan']; ?></td>
            </tr>
            <?php 
                    $total += $row['harga_perbaikan'];
                    endwhile; ?>
            <tr>
                <td colspan="6" align="center"><b>TOTAL</b></td>
                <td><?= $total; ?></td>
            </tr>
            
        </table>
    </div>
</body>

</html>

<script>
window.print();
</script>
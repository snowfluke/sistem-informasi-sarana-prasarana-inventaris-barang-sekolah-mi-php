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
    <title>Cetak Laporan Penjualan</title>
</head>

<body>
    <?php
    $now = date('Y-m-d');
    $tanggal_awal = $_POST['tanggal_awal'];
    $tanggal_akhir = $_POST['tanggal_akhir'];
    $query = mysqli_query($con,"SELECT x.*, x1.nama_barang, x1.harga_barang, x2.nama FROM tb_penjualan x JOIN tb_barang x1 ON x1.id_barang = x.id_barang JOIN tb_kasir x2 ON x2.id_kasir = x.id_kasir WHERE x.tanggal >= '$tanggal_awal' AND x.tanggal <= '$tanggal_akhir' ORDER BY x.tanggal ASC")or die(mysqli_error($con));
    
    ?>
    <div style="page-break-after:always;text-align:center;margin-top:5%;">
        <div style="line-height:5px;">
            <h2>LAPORAN PENJUALAN TERAPI PONSEL</h2>
            <h4><?= date('d-m-Y',strtotime($tanggal_awal)); ?> - <?= date('d-m-Y',strtotime($tanggal_akhir)); ?></h4>
        </div>
        <hr style="border-color:black;">
        <table class="tab">
            <tr>
                <th width="20">NO</th>
                <th>TGL</th>
                <th>NAMA BARANG</th>
                <th>HARGA</th>
                <th>QTY</th>
                <th>KASIR</th>
                <th>JUMLAH</th>
            </tr>
            <?php $n=1; $total=0; while($row = mysqli_fetch_array($query)): ?>
            <tr>
                <td align="center"><?= $n++.'.'; ?></td>
                <td><?= date('d-m-Y',strtotime($row['tanggal'])); ?></td>
                <td><?= $row['nama_barang']; ?></td>
                <td><?= $row['harga_barang']; ?></td>
                <td><?= $row['stok_dijual']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= ($row['stok_dijual'] * $row['harga_barang']); ?></td>
            </tr>
            <?php 
                    $total += ($row['stok_dijual'] * $row['harga_barang']);
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
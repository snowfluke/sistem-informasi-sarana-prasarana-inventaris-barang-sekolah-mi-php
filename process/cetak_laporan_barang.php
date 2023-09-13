<?php
// session_start();
include('../config/conn.php');
include('../config/function.php');
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
    <title>Cetak Laporan</title>
</head>

<body>
    <?php
    $now           = date('Y-m-d');
    $id_ruangan    = $_POST['id_ruangan'];
    $id_barang     = $_POST['id_barang'];
    $id_kondisi    = $_POST['id_kondisi'];
    $tanggal_awal  = $_POST['tanggal_awal'];
    $tanggal_akhir = $_POST['tanggal_akhir'];

    if (!isset($id_ruangan)) {
        return header("Location:" . $base_url);
    }
    
    $query = "SELECT tb_barang.*, tb_merek.nama_merek, tb_ruangan.nama_ruangan, tb_kondisi.nama_kondisi, tb_kategori.nama_kategori, IFNULL(SUM(CASE WHEN tb_transaksi.jenis_transaksi = 'masuk' THEN tb_transaksi.jumlah WHEN tb_transaksi.jenis_transaksi = 'keluar' OR (tb_transaksi.jenis_transaksi = 'pinjam' AND tb_transaksi.status = 'belum') THEN -tb_transaksi.jumlah ELSE NULL END), tb_barang.jumlah_awal) AS total_jumlah FROM tb_barang LEFT JOIN tb_merek ON tb_merek.id_merek = tb_barang.id_merek LEFT JOIN tb_kategori ON tb_kategori.id_kategori = tb_barang.id_kategori LEFT JOIN tb_ruangan ON tb_ruangan.id_ruangan = tb_barang.id_ruangan LEFT JOIN tb_kondisi ON tb_kondisi.id_kondisi = tb_barang.id_kondisi LEFT JOIN tb_transaksi ON tb_transaksi.id_barang = tb_barang.id_barang WHERE tb_barang.tanggal_barang >= '$tanggal_awal' AND tb_barang.tanggal_barang <= '$tanggal_akhir'";


    if ($id_ruangan) {
        $query .= " AND tb_barang.id_ruangan='$id_ruangan'";
    }

    if ($id_barang && $id_ruangan) {
        $query .= " AND tb_barang.id_barang='$id_barang'";
    }else if($id_barang){
        $query .= " AND LOWER(TRIM(tb_barang.nama_barang)) = '$id_barang'";
    }
    

    if ($id_kondisi) {
        $query .= " AND tb_barang.id_kondisi='$id_kondisi'";
    }

    $query .= " GROUP BY tb_barang.id_barang ORDER BY tb_barang.id_barang DESC";
    $query = mysqli_query($con, $query) or die(mysqli_error($con));
    ?>
    <div style="page-break-after:always;text-align:center;margin-top:5%;">
        <div style="line-height:5px;">
            <h2>LAPORAN BARANG MI NUR JALIN</h2>
            <h4>TGL:
                <?= date('d-m-Y', strtotime($now)); ?>
            </h4>
        </div>
        <hr style="border-color:black;">
        <table class="tab">
            <tr>
                <th width="20">NO</th>
                <th>NAMA</th>
                <th>MEREK</th>
                <th>RUANGAN</th>
                <th>KONDISI</th>
                <th>TGL</th>
                <th>JUMLAH</th>
                <th>KET</th>
            </tr>
            <?php $n     = 1;
            $total = 0;
            while ($row = mysqli_fetch_array($query)): ?>
                <tr>
                    <td align="center">
                        <?= $n++ . '.'; ?>
                    </td>
                    <td>
                        <?= $row['nama_barang']; ?>
                    </td>
                    <td>
                        <?= $row['nama_merek']; ?>
                    </td>
                    <td>
                        <?= $row['nama_ruangan']; ?>
                    </td>
                    <td>
                        <?= $row['nama_kondisi']; ?>
                    </td>
                    <td>
                        <?= $row['tanggal_barang']; ?>
                    </td>
                    <td>
                        <?= $row['total_jumlah']; ?>
                    </td>
                    <td>
                        <?= $row['keterangan_barang']; ?>
                    </td>
                </tr>
                <?php
                $total += $row['total_jumlah'];
            endwhile; ?>
            <tr>
                <td colspan="6" align="center"><b>TOTAL BARANG</b></td>
                <td colspan="2">
                    <?= $total; ?>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>

<script>
    window.print();
</script>
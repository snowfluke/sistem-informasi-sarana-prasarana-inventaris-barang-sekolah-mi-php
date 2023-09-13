<?php hakAkses(['admin']); $now = date('Y-m-d'); 

$barang = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS total FROM tb_barang"));
$barang_masuk = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS total FROM tb_transaksi WHERE jenis_transaksi = 'masuk'"));
$barang_keluar = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS total FROM tb_transaksi WHERE jenis_transaksi = 'keluar'"));
$barang_pinjam = mysqli_fetch_array(mysqli_query($con, "SELECT COUNT(*) AS total FROM tb_transaksi WHERE jenis_transaksi = 'pinjam'"));
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <p class="card-text">Data Barang</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $barang['total'];?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <p class="card-text">Barang Masuk</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $barang_masuk['total'];?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <p class="card-text">Barang Keluar</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $barang_keluar['total'];?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <p class="card-text">Peminjaman</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $barang_pinjam['total'];?></h5>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
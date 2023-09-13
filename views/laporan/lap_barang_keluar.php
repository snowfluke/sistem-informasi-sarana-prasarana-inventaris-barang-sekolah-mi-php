<?php hakAkses(['admin']); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Barang Keluar</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?=base_url();?>process/cetak_laporan_transaksi_barang.php" method="post" target="_blank">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="tanggal_awal">Tanggal Awal</label>
                            <input type="hidden" value="keluar" name="jenis_transaksi"/>
                            <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control"
                                value="<?=date('Y-m-d');?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="tanggal_akhir">Tanggal Akhir</label>
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control"
                                value="<?=date('Y-m-d');?>">
                        </div>
                    </div>
                    <div class="col-md-2 p-2">
                        <button type="submit" class="btn btn-info mt-4"><i class="fas fa-print"></i> Cetak
                            Laporan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
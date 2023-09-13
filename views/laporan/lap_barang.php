<?php hakAkses(['admin']); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Barang</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url(); ?>process/cetak_laporan_barang.php" method="post" target="_blank">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_ruangan">Ruangan</label>
                            <select name="id_ruangan" id="id_ruangan" class="form-control" style="width:100%;">
                                <option value="">-- Semua ruangan --</option>
                                <?= list_ruangan(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_barang">Barang</label>
                            <select name="id_barang" id="id_barang" class="form-control" style="width:100%;">
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal_awal">Tanggal Awal</label>
                            <input type="hidden" value="masuk" name="jenis_transaksi" />
                            <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control"
                                value="<?= date('Y-m-d'); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tanggal_akhir">Tanggal Akhir</label>
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control"
                                value="<?= date('Y-m-d'); ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_kondisi">Kondisi</label>
                            <select name="id_kondisi" id="id_kondisi" class="form-control" style="width:100%;">
                                <option value="">-- Semua Kondisi --</option>
                                <?= list_kondisi(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">

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
<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        var idBarang = '';
        $("#id_ruangan").on("change", enableBarang)
        $("#id_ruangan").val("").trigger("change")

        function enableBarang() {
            let selectedOption = $('#id_ruangan').find("option:selected").val()

            $.ajax({
                type: "POST",
                data: {
                    id_ruangan: selectedOption
                },
                url: '<?= base_url(); ?>process/view_barang_by_ruangan2.php',
                dataType: 'json',
                success: function (data) {
                    $("#id_barang").empty();

                    if (!data.result) {
                        $("#id_barang").append('<option value="">-- Tidak ada data barang di ruangan --</option>');
                        return;
                    }
                    

                    $('#id_barang').prop('disabled', false);
                    $("#id_barang").append(data.result);
                    $('[name="id_barang"]').val(idBarang).trigger('change')

                }
            });
        }
    })
</script>
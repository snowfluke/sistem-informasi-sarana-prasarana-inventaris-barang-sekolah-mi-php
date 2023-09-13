<?php hakAkses(['admin']) ?>
<script>
function submit(x) {
    if (x == 'add') {
        $('#barangModal .modal-title').html('Tambah barang');
        $('[name="nama_barang"]').val("").trigger('change')
        $('[name="id_merek"]').val("").trigger('change')
        $('[name="id_kategori"]').val("").trigger('change')
        $('[name="id_ruangan"]').val("").trigger('change')
        $('[name="tanggal"]').val("").trigger("change")
        $('[name="id_kondisi"]').val("").trigger('change')
        $('[name="jumlah_awal"]').val("").trigger('change')
        $('[name="keterangan_barang"]').val("").trigger('change')
        $('[name="ubah"]').hide();
        $('[name="tambah"]').show();
    } else {
        $('#barangModal .modal-title').html('Edit barang');

        $('[name="nama_barang"]').val("").trigger('change')
        $('[name="id_merek"]').val("").trigger('change')
        $('[name="id_kategori"]').val("").trigger('change')
        $('[name="id_ruangan"]').val("").trigger('change')
        $('[name="id_kondisi"]').val("").trigger('change')
        $('[name="jumlah_awal"]').val("").trigger('change')
        $('[name="keterangan_barang"]').val("").trigger('change')

        $('[name="tambah"]').hide();
        $('[name="ubah"]').show();

        $.ajax({
            type: "POST",
            data: {
                id: x
            },
            url: '<?=base_url();?>process/view_barang.php',
            dataType: 'json',
            success: function(data) {
            $('[name="id"]').val(data.id_barang)
            $('[name="nama_barang"]').val(data.nama_barang).trigger("change")
            $('[name="tanggal"]').val(data.tanggal_barang).trigger("change")
            $('[name="id_merek"]').val(data.id_merek).trigger("change")
            $('[name="id_kategori"]').val(data.id_kategori).trigger("change")
            $('[name="id_ruangan"]').val(data.id_ruangan).trigger("change")
            $('[name="id_kondisi"]').val(data.id_kondisi).trigger("change")
            $('[name="jumlah_awal"]').val(data.jumlah_awal)
            $('[name="keterangan_barang"]').val(data.keterangan_barang)
            }
        });
    }
}
</script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Barang</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#barangModal"
                onclick="submit('add')">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20">NO</th>
                            <th>NAMA</th>
                            <th>MEREK</th>
                            <th>KATEGORI</th>
                            <th>RUANGAN</th>
                            <th>KONDISI</th>
                            <th>JML AWAL</th>
                            <th>JML SEKARANG</th>
                            <th>TGL PENGADAAN</th>
                            <th>KETERANGAN</th>
                            <th width="50">AKSI</th>
                        </tr>
                        <tr id="filter">
                            <th width="20"></th>
                            <th>NAMA</th>
                            <th>MEREK</th>
                            <th>KATEGORI</th>
                            <th>RUANGAN</th>
                            <th>KONDISI</th>
                            <th></th>
                            <th></th>
                            <th>TGL PENGADAAN</th>
                            <th>KETERANGAN</th>
                            <th width="50"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $n=1;
                        $query = mysqli_query($con,"SELECT tb_barang.*, tb_merek.nama_merek, tb_kategori.nama_kategori, tb_kondisi.nama_kondisi, tb_ruangan.nama_ruangan, (tb_barang.jumlah_awal + SUM(CASE WHEN tb_transaksi.jenis_transaksi = 'masuk' THEN tb_transaksi.jumlah WHEN tb_transaksi.jenis_transaksi = 'keluar' OR (tb_transaksi.jenis_transaksi = 'pinjam' AND tb_transaksi.status = 'belum') THEN -tb_transaksi.jumlah ELSE 0 END)) AS total_jumlah FROM tb_barang LEFT JOIN tb_merek ON tb_merek.id_merek = tb_barang.id_merek LEFT JOIN tb_kategori ON tb_kategori.id_kategori = tb_barang.id_kategori LEFT JOIN tb_ruangan ON tb_ruangan.id_ruangan = tb_barang.id_ruangan LEFT JOIN tb_kondisi ON tb_kondisi.id_kondisi = tb_barang.id_kondisi LEFT JOIN tb_transaksi ON tb_transaksi.id_barang = tb_barang.id_barang GROUP BY tb_barang.id_barang ORDER BY tb_barang.id_barang DESC")or die(mysqli_error($con));
                        while($row = mysqli_fetch_array($query)):
                        ?>
                        <tr>
                            <td><?= $n++; ?></td>
                            <td><?= $row['nama_barang']; ?></td>
                            <td><?= $row['nama_merek']; ?></td>
                            <td><?= $row['nama_kategori']; ?></td>
                            <td><?= $row['nama_ruangan']; ?></td>
                            <td><?= $row['nama_kondisi']; ?></td>
                            <td><?= $row['jumlah_awal']; ?></td>
                            <td><?= $row['total_jumlah']; ?></td>
                            <td><?= $row['tanggal_barang']; ?></td>
                            <td><?= $row['keterangan_barang']; ?></td>
                            <td>
                            <div class="d-inline-flex p-2">
                                <a href="#barangModal" data-toggle="modal" onclick="submit(<?=$row['id_barang'];?>)"
                                    class="btn btn-sm btn-circle btn-info mr-2"><i class="fas fa-edit"></i></a>
                                <a href="<?=base_url();?>/process/process_barang.php?act=<?=encrypt('delete');?>&id=<?=encrypt($row['id_barang']);?>"
                                    class="btn btn-sm btn-circle btn-danger btn-hapus"><i class="fas fa-trash"></i></a>
                            </div>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal Tambah Barang -->
<div class="modal fade" id="barangModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?=base_url();?>process/process_barang.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal">Tanggal<span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                value="<?=date('Y-m-d');?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang <span class="text-danger">*</span></label>
                                <input type="hidden" name="id" class="form-control">
                                <input type="text" class="form-control" name="nama_barang" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_merek">Merek</label>
                                <select name="id_merek" id="id_merek" class="form-control select2" style="width:100%;"
                                    >
                                    <option value="">-- Pilih merek --</option>
                                    <?= list_merek(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_kategori">Kategori</label>
                                <select name="id_kategori" id="id_kategori" class="form-control select2" style="width:100%;"
                                    >
                                    <option value="">-- Pilih kategori --</option>
                                    <?= list_kategori(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_ruangan">Ruangan</label>
                                <select name="id_ruangan" id="id_ruangan" class="form-control select2" style="width:100%;"
                                    >
                                    <option value="">-- Pilih ruangan --</option>
                                    <?= list_ruangan(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_kondisi">Kondisi</label>
                                <select name="id_kondisi" id="id_kondisi" class="form-control select2" style="width:100%;"
                                    >
                                    <option value="">-- Pilih kondisi --</option>
                                    <?= list_kondisi(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jumlah_awal">Jumlah Awal</label>
                                <input type="number" class="form-control" name="jumlah_awal" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan_barang">Keterangan</label>
                                <textarea name="keterangan_barang" id="keterangan_barang" cols="30" rows="4" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>
                    <hr class="sidebar-divider">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-times"></i>
                        Batal</button>
                    <button class="btn btn-primary float-right" type="submit" name="tambah"><i class="fas fa-save"></i>
                        Tambah</button>
                    <button class="btn btn-primary float-right" type="submit" name="ubah"><i class="fas fa-save"></i>
                        Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
    var table = $('#dataTable2').DataTable({
    initComplete: function () {
        this.api()
            .columns()
            .every(function () {
                var column = this;
                var title = column.header().textContent;
                if(!title) {
                    $('<span/>')
                    .appendTo($(column.header()).empty())
                    return
                }
 
                // Create input element and add event listener
                $('<input type="text" placeholder="Filter ' + title + '" />')
                    .appendTo($(column.header()).empty())
                    .on('keyup change clear', function () {
                        if (column.search() !== this.value) {
                            column.search(this.value).draw();
                        }
                    });
            });
    }
});

});
</script>
<?php hakAkses(['admin']); ?>
<script>
function submit(x) {
    var idBarang = '';
    if (x == 'add') {
        $('#pinjamModal .modal-title').html('Tambah barang peminjaman');
        $('[name="id_ruangan"]').val("").trigger('change')
        $('[name="id_barang"]').val("")
        idBarang = '';
        $("#id_barang").empty();
        $('#id_barang').prop('disabled', true);
        $('[name="stok"]').val('')
        $('[name="stok_display"]').val('')
        
        $('[name="id_merek"]').val("").trigger('change')
        $('[name="id_kategori"]').val("").trigger('change')
        $('[name="id_kondisi"]').val("").trigger('change')
        $('[name="jumlah"]').val("").trigger('change')
        $('[name="keterangan_transaksi"]').val("").trigger('change')
        $('[name="tanggal"]').val("").trigger('change')
        $('[name="status"]').val("belum").trigger('change')
        
        $('[name="ubah"]').hide();
        $('[name="tambah"]').show();
        $('#status').hide()
    } else {
        $('#pinjamModal .modal-title').html('Edit barang peminjaman');
        
        $('[name="id_barang"]').val("").trigger('change')
        $('[name="id_merek"]').val("").trigger('change')
        $('[name="id_kategori"]').val("").trigger('change')
        $('[name="id_ruangan"]').val("")
        $('[name="id_kondisi"]').val("").trigger('change')
        $('[name="jumlah"]').val("").trigger('change')
        $('[name="keterangan_transaksi"]').val("").trigger('change')
        $('[name="tanggal"]').val("").trigger('change')
        $('[name="status"]').val("").trigger('change')
        
        $('[name="tambah"]').hide();
        $('[name="ubah"]').show();
        $('#status').show()
        
        $.ajax({
            type: "POST",
            data: {
                id: x
            },
            url: '<?=base_url();?>process/view_transaksi.php',
            dataType: 'json',
            success: function(data) {
                $('[name="id"]').val(data.id_transaksi);
                idBarang = data.id_barang
                $('[name="id_ruangan"]').val(data.id_ruangan).trigger('change')

                $('[name="jumlah"]').val(data.jumlah)
                $('[name="keterangan_transaksi"]').val(data.keterangan_transaksi)
                $('[name="tanggal"]').val(data.tanggal)
                $('[name="status"]').val(data.status)
            }
        });
    }

        function setAllProperty() {
            let selectedOption = $('#id_barang').find("option:selected");
            if (!selectedOption) return;
            let idMerek = selectedOption.data("id-merek")
            let idKategori = selectedOption.data("id-kategori")
            let idKondisi = selectedOption.data("id-kondisi")
            let stok = selectedOption.data("stok")

            $('[name="id_merek"]').val(idMerek)
            $('[name="id_kategori"]').val(idKategori)
            $('[name="id_kondisi"]').val(idKondisi)

            // Ini
            $('[name="stok"]').val(stok)
            $('[name="stok_display"]').val(stok)
        }

        function enableBarang() {
            let selectedOption = $('#id_ruangan').find("option:selected").val()
            if (!selectedOption) return;
            $.ajax({
                type: "POST",
                data: {
                    id_ruangan: selectedOption
                },
                url: '<?= base_url(); ?>process/view_barang_by_ruangan.php',
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

        $(document).ready(function () {
            $("#id_barang").on("change", setAllProperty);
            $("#id_ruangan").on("change", enableBarang)
        })
}
</script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Peminjaman</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#" class="btn btn-primary btn-icon-split btn-sm" data-toggle="modal" data-target="#pinjamModal" onclick="submit('add', '<?= $_SESSION['id'] ?>')">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah</span>
            </a>
            <a href="<?=base_url();?>process/cetak_laporan_pinjam_today.php" target="_blank"
                class="btn btn-info btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-print"></i>
                </span>
                <span class="text">Cetak peminjaman hari ini</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5">NO</th>
                            <th>TANGGAL</th>
                            <th>STATUS</th>
                            <th>NAMA</th>
                            <th>MEREK</th>
                            <th>KATEGORI</th>
                            <th>RUANGAN</th>
                            <th>KONDISI</th>
                            <th>JUMLAH</th>
                            <th>KETERANGAN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $n=1;
                        $query = mysqli_query($con,"SELECT * FROM tb_transaksi LEFT JOIN tb_barang ON tb_transaksi.id_barang = tb_barang.id_barang LEFT JOIN tb_merek ON tb_merek.id_merek = tb_barang.id_merek LEFT JOIN tb_kategori ON tb_kategori.id_kategori = tb_barang.id_kategori LEFT JOIN tb_ruangan ON tb_ruangan.id_ruangan = tb_barang.id_ruangan LEFT JOIN tb_kondisi ON tb_kondisi.id_kondisi = tb_barang.id_kondisi WHERE jenis_transaksi = 'pinjam' ORDER BY tanggal ASC")or die(mysqli_error($con));
                        while($row = mysqli_fetch_array($query)):
                        ?>
                        <tr>
                            <td><?= $n++; ?></td>
                            <td><?= date('d-m-Y',strtotime($row['tanggal'])); ?></td>
                            <td class="font-weight-bold <?= $row['status'] != 'selesai' ? 'text-danger' : 'text-success'; ?>"><?= $row['status'] != 'selesai' ? "DIPINJAM" : "KEMBALI"; ?></td>
                            <td><?= $row['nama_barang']; ?></td>
                            <td><?= $row['nama_merek']; ?></td>
                            <td><?= $row['nama_kategori']; ?></td>
                            <td><?= $row['nama_ruangan']; ?></td>
                            <td><?= $row['nama_kondisi']; ?></td>
                            <td><?= $row['jumlah']; ?></td>
                            <td><?= $row['keterangan_transaksi']; ?></td>
                            <td>
                            <div class="d-inline-flex p-2">
                                <a href="#pinjamModal" data-toggle="modal" onclick="submit(<?=$row['id_transaksi'];?>)"
                                    class="btn btn-sm btn-circle btn-info mr-2"><i class="fas fa-edit"></i></a>
                                    <?php if($row['status'] == 'belum'):?>
                                <a href="<?=base_url();?>/process/process_pinjam.php?act=<?=encrypt('selesai');?>&id=<?=encrypt($row['id_transaksi']);?>"
                                    class="btn btn-sm btn-circle btn-success mr-2 selesai"><i class="fas fa-check"></i></a>
                                    <?php endif;?>
                                <a href="<?=base_url();?>/process/process_pinjam.php?act=<?=encrypt('delete');?>&id=<?=encrypt($row['id_transaksi']);?>"
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

<!-- Modal Tambah barang_peminjamana -->
<div class="modal fade" id="pinjamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?=base_url();?>process/process_pinjam.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang peminjaman</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal">Tanggal<span class="text-danger">*</span></label>
                                <input type="hidden" name="id" class="form-control">
                                <input type="hidden" name="id_kasir" value="<?= $_SESSION['id'] ?>" class="form-control">
                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                value="<?=date('Y-m-d');?>" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_ruangan">Ruangan<span class="text-danger">*</span></label>
                                <select name="id_ruangan" id="id_ruangan" class="form-control select2"
                                    style="width:100%;">
                                    <option value="">-- Pilih Ruangan --</option>
                                    <?= list_ruangan_berisi(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_barang">Barang<span class="text-danger">*</span></label>
                                <select name="id_barang" id="id_barang" class="form-control select2" style="width:100%;"
                                    disabled>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_merek">Merek<span class="text-danger">*</span></label>
                                <select name="id_merek" id="id_merek" class="form-control" style="width:100%;"
                                disabled>
                                    <?= list_merek(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_kategori">Kategori<span class="text-danger">*</span></label>
                                <select name="id_kategori" id="id_kategori" class="form-control" style="width:100%;"
                                disabled    >
                                    <?= list_kategori(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_kondisi">Kondisi<span class="text-danger">*</span></label>
                                <select name="id_kondisi" id="id_kondisi" class="form-control" style="width:100%;"
                                disabled   >
                                    <?= list_kondisi(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jumlah">Jumlah<span class="text-danger">*</span></label>
                                <input type="text" class="form-control uang" id="jumlah" name="jumlah" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stok_display">Jumlah saat ini<span class="text-danger">*</span></label>
                                <input type="hidden" name="stok">
                                <input type="text" class="form-control uang" id="stok_display" name="stok_display" disabled>
                            </div>
                        </div>
                        <div class="col-md-6"  id="status">
                            <div class="form-group">
                                <label for="status">Status Pengembalian<span class="text-danger">*</span></label>
                                <select name="status" class="form-control" style="width:100%;"
                                >
                                <option value="belum">Belum Dikembalikan</option>
                                <option value="selesai">Sudah Dikembalikan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan_transaksi">Keterangan<span class="text-danger">*</span></label>
                                <textarea name="keterangan_transaksi" id="keterangan_transaksi" cols="30" rows="4" class="form-control" required></textarea>
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
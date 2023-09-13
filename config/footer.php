<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Keluar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body bg-danger text-white">Anda yakin ingin keluar dari aplikasi ?</div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-sm btn-danger" href="<?=base_url();?>process/logout.php"><i
                        class="fas fa-sign-out-alt"></i>
                    Iya, Keluar</a>
            </div>
        </div>
    </div>
</div>
<!-- Ganti Password Modal-->
<div class="modal fade" id="gantiPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?=base_url();?>process/process_kasir.php?act=<?=encrypt('ganti_pass');?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-black">Password Baru</label>
                        <input type="hidden" name="id" value="<?=$_SESSION['id'];?>">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-sm btn-success" type="submit" name="ubah_pass"><i class="fas fa-key"></i>
                        Ganti Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?=base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?=base_url();?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?=base_url();?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables/cdn.datatables.net_fixedheader_3.2.3_js_dataTables.fixedHeader.min.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables/dataTables.buttons.min.js"></script>
<script src="<?=base_url();?>assets/vendor/datatables/buttons.print.min.js"></script>
<script src="<?=base_url();?>assets/vendor/jquery-mask/jquery-mask.min.js"></script>
<script src="<?=base_url();?>assets/vendor/sweet-alert/sweetalert2.all.min.js"></script>
<script src="<?=base_url();?>assets/vendor/select2/js/select2.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?=base_url();?>assets/js/demo/datatables-demo.js"></script>
<script src="<?=base_url();?>assets/js/demo/sweet-alert.js"></script>
<script>
$(document).ready(function() {
    $('.select2').select2({
        theme: "classic",
    });
    $('.uang').mask('000.000.000.000.000', {
        reverse: true
    });
})
</script>
</body>

</html>
<?php
session_start();
include ('../config/conn.php');

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = mysqli_query($con,"SELECT x.*, x1.nama_kerusakan, x1.harga_perbaikan, x2.nama FROM tb_perbaikan x JOIN tb_jenis_kerusakan x1 ON x1.id_kerusakan = x.id_kerusakan JOIN tb_kasir x2 ON x2.id_kasir = x.id_kasir WHERE id_perbaikan='$id'") or die(mysqli_error($con));
    $data = mysqli_fetch_array($query);
    echo json_encode($data);
}
?>
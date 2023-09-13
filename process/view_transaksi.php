<?php
session_start();
include ('../config/conn.php');

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $query = mysqli_query($con,"SELECT * FROM tb_transaksi LEFT JOIN tb_barang ON tb_transaksi.id_barang = tb_barang.id_barang LEFT JOIN tb_merek ON tb_merek.id_merek = tb_barang.id_merek LEFT JOIN tb_kategori ON tb_kategori.id_kategori = tb_barang.id_kategori LEFT JOIN tb_ruangan ON tb_ruangan.id_ruangan = tb_barang.id_ruangan LEFT JOIN tb_kondisi ON tb_kondisi.id_kondisi = tb_barang.id_kondisi WHERE id_transaksi='$id'") or die(mysqli_error($con));
    $data = mysqli_fetch_array($query);
    echo json_encode($data);
}
?>
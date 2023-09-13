<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['tambah'])){
    $id_barang = $_POST['id_barang'];
    $jenis_transaksi = "keluar";
    $status = "selesai";
    $jumlah = $_POST['jumlah'];
    $keterangan_transaksi =  $_POST['keterangan_transaksi'];
    $tanggal =  $_POST['tanggal'];
    $stok =  $_POST['stok'];

    if($jumlah > $stok){
        $error = 'Transaksi gagal, jumlah melebihi stok yang ada saat ini!';
        $_SESSION['error'] = $error;
        return header('Location:../?barang_keluar');
    }

    $insert = mysqli_query($con,"INSERT INTO tb_transaksi (id_barang, jenis_transaksi, status, jumlah, tanggal, keterangan_transaksi) VALUES ('$id_barang', '$jenis_transaksi', '$status', '$jumlah', '$tanggal', '$keterangan_transaksi')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data barang keluar';
    }else{
        $error = 'Gagal menambahkan data barang keluar';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?barang_keluar');
}

//proses ubah
if(isset($_POST['ubah'])){
    $id = $_POST['id'];
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];
    $keterangan_transaksi =  $_POST['keterangan_transaksi'];
    $tanggal =  $_POST['tanggal'];
    $stok =  $_POST['stok'];

    if($jumlah > $stok){
        $error = 'Transaksi gagal, jumlah melebihi stok yang ada saat ini!';
        $_SESSION['error'] = $error;
        return header('Location:../?barang_keluar');
    }


    $update = mysqli_query($con,"UPDATE tb_transaksi SET id_barang='$id_barang',  jumlah='$jumlah', keterangan_transaksi='$keterangan_transaksi', tanggal='$tanggal' WHERE id_transaksi='$id'") or die (mysqli_error($con));
    
    // var_dump($update);die;
    if($update){
        $success = 'Berhasil mengubah data barang keluar';
    }else{
        $error = 'Gagal mengubah data barang keluar';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?barang_keluar');
}


//proses hapus
if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    $id = decrypt($_GET['id']);
    $query = mysqli_query($con, "DELETE FROM tb_transaksi WHERE id_transaksi='$id'")or die(mysqli_error($con));
    if($query){
        $success = 'Berhasil menghapus data barang keluar';
    }else{
        $error = 'Gagal menghapus data barang keluar';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?barang_keluar');
}

?>
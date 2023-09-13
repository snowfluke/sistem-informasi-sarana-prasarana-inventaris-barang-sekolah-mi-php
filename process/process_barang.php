<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['tambah'])){
    $nama_barang = $_POST['nama_barang'];
    $id_merek = $_POST['id_merek'];
    $id_kategori =  $_POST['id_kategori'];
    $id_ruangan =  $_POST['id_ruangan'];
    $id_kondisi =  $_POST['id_kondisi'];
    $jumlah_awal =  $_POST['jumlah_awal'];
    $keterangan_barang =  $_POST['keterangan_barang'];
    $tanggal_barang =  $_POST['tanggal'];
    

    $insert = mysqli_query($con,"INSERT INTO tb_barang (id_merek, id_kategori, id_ruangan, id_kondisi, jumlah_awal, nama_barang, keterangan_barang, tanggal_barang) VALUES ('$id_merek','$id_kategori','$id_ruangan','$id_kondisi','$jumlah_awal', '$nama_barang','$keterangan_barang', '$tanggal_barang')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data barang';
    }else{
        $error = 'Gagal menambahkan data barang';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?barang');
}

//proses ubah
if(isset($_POST['ubah'])){
    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $id_merek = $_POST['id_merek'];
    $id_kategori =  $_POST['id_kategori'];
    $id_ruangan =  $_POST['id_ruangan'];
    $id_kondisi =  $_POST['id_kondisi'];
    $jumlah_awal =  $_POST['jumlah_awal'];
    $keterangan_barang =  $_POST['keterangan_barang'];
    $tanggal_barang =  $_POST['tanggal'];
    
    $update = mysqli_query($con,"UPDATE tb_barang SET nama_barang='$nama_barang', id_merek='$id_merek', id_kategori='$id_kategori', id_ruangan='$id_ruangan', id_kondisi='$id_kondisi', jumlah_awal='$jumlah_awal', keterangan_barang='$keterangan_barang', tanggal_barang='$tanggal_barang' WHERE id_barang='$id'") or die (mysqli_error($con));
    
    // var_dump($update);die;
    if($update){
        $success = 'Berhasil mengubah data barang';
    }else{
        $error = 'Gagal mengubah data barang';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?barang');
}


//proses hapus
if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    $id = decrypt($_GET['id']);
    $query = mysqli_query($con, "DELETE FROM tb_barang WHERE id_barang='$id'")or die(mysqli_error($con));
    if($query){
        $success = 'Berhasil menghapus data barang';
    }else{
        $error = 'Gagal menghapus data barang';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?barang');
}

?>
<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['tambah'])){
    $nama_kategori = $_POST['nama_kategori'];
    $keterangan = $_POST['keterangan'];

    $insert = mysqli_query($con,"INSERT INTO tb_kategori (nama_kategori, keterangan) VALUES ('$nama_kategori','$keterangan')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data kategori';
    }else{
        $error = 'Gagal menambahkan data kategori';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?kategori');
}

//proses ubah
if(isset($_POST['ubah'])){
    $id = $_POST['id'];
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];
    $keterangan = $_POST['keterangan'];

    $update = mysqli_query($con,"UPDATE tb_kategori SET nama_kategori='$nama_kategori', keterangan='$keterangan' WHERE id_kategori='$id'") or die (mysqli_error($con));
    
    // var_dump($update);die;
    if($update){
        $success = 'Berhasil mengubah data kategori';
    }else{
        $error = 'Gagal mengubah data kategori';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?kategori');
}


//proses hapus
if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    $id = decrypt($_GET['id']);
    $query = mysqli_query($con, "DELETE FROM tb_kategori WHERE id_kategori='$id'")or die(mysqli_error($con));
    if($query){
        $success = 'Berhasil menghapus data kategori';
    }else{
        $error = 'Gagal menghapus data kategori';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?kategori');
}

?>
<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['tambah'])){
    $nama_merek = $_POST['nama_merek'];
    $keterangan = $_POST['keterangan'];

    $insert = mysqli_query($con,"INSERT INTO tb_merek (nama_merek, keterangan) VALUES ('$nama_merek','$keterangan')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data merek';
    }else{
        $error = 'Gagal menambahkan data merek';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?merek');
}

//proses ubah
if(isset($_POST['ubah'])){
    $id = $_POST['id'];
    $id_merek = $_POST['id_merek'];
    $nama_merek = $_POST['nama_merek'];
    $keterangan = $_POST['keterangan'];

    $update = mysqli_query($con,"UPDATE tb_merek SET nama_merek='$nama_merek', keterangan='$keterangan' WHERE id_merek='$id'") or die (mysqli_error($con));
    
    // var_dump($update);die;
    if($update){
        $success = 'Berhasil mengubah data merek';
    }else{
        $error = 'Gagal mengubah data merek';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?merek');
}


//proses hapus
if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    $id = decrypt($_GET['id']);
    $query = mysqli_query($con, "DELETE FROM tb_merek WHERE id_merek='$id'")or die(mysqli_error($con));
    if($query){
        $success = 'Berhasil menghapus data merek';
    }else{
        $error = 'Gagal menghapus data merek';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?merek');
}

?>
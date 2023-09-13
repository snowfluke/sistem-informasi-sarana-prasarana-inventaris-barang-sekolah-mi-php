<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['tambah'])){
    $nama_kondisi = $_POST['nama_kondisi'];
    $keterangan = $_POST['keterangan'];

    $insert = mysqli_query($con,"INSERT INTO tb_kondisi (nama_kondisi, keterangan) VALUES ('$nama_kondisi','$keterangan')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data kondisi';
    }else{
        $error = 'Gagal menambahkan data kondisi';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?kondisi');
}

//proses ubah
if(isset($_POST['ubah'])){
    $id = $_POST['id'];
    $id_kondisi = $_POST['id_kondisi'];
    $nama_kondisi = $_POST['nama_kondisi'];
    $keterangan = $_POST['keterangan'];

    $update = mysqli_query($con,"UPDATE tb_kondisi SET nama_kondisi='$nama_kondisi', keterangan='$keterangan' WHERE id_kondisi='$id'") or die (mysqli_error($con));
    
    // var_dump($update);die;
    if($update){
        $success = 'Berhasil mengubah data kondisi';
    }else{
        $error = 'Gagal mengubah data kondisi';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?kondisi');
}


//proses hapus
if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    $id = decrypt($_GET['id']);
    $query = mysqli_query($con, "DELETE FROM tb_kondisi WHERE id_kondisi='$id'")or die(mysqli_error($con));
    if($query){
        $success = 'Berhasil menghapus data kondisi';
    }else{
        $error = 'Gagal menghapus data kondisi';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?kondisi');
}

?>
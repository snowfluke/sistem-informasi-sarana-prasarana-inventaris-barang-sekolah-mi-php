<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['tambah'])){
    $id_lahan = $_POST['id'];
    $nama_lahan = $_POST['nama_lahan'];
    $no_sert_lahan = $_POST['no_sert_lahan'];
    $luas_lahan =  $_POST['luas_lahan'];
    $status_lahan = $_POST['status_lahan'];

    $insert = mysqli_query($con,"INSERT INTO tb_lahan (nama_lahan, no_sert_lahan, luas_lahan, status_lahan ) VALUES ('$nama_lahan', '$no_sert_lahan', '$luas_lahan', '$status_lahan')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data lahan';
    }else{
        $error = 'Gagal menambahkan data lahan';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?lahan');
}

//proses ubah
if(isset($_POST['ubah'])){
    $id = $_POST['id'];
    $nama_lahan = $_POST['nama_lahan'];
    $no_sert_lahan = $_POST['no_sert_lahan'];
    $luas_lahan =  $_POST['luas_lahan'];
    $status_lahan = $_POST['status_lahan'];

    $sql = "UPDATE tb_lahan SET  nama_lahan='$nama_lahan', no_sert_lahan='$no_sert_lahan', luas_lahan='$luas_lahan', status_lahan='$status_lahan' WHERE id_lahan='$id'";
    $update = mysqli_query($con,$sql) or die (mysqli_error($con));
    
    // var_dump($update);die;
    if($update){
        $success = 'Berhasil mengubah data lahan';
    }else{
        $error = 'Gagal mengubah data lahan';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?lahan');
}


if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    $id = decrypt($_GET['id']);
    $query = mysqli_query($con, "DELETE FROM tb_lahan WHERE id_lahan='$id'")or die(mysqli_error($con));
    if($query){
        $success = 'Berhasil menghapus data lahan';
    }else{
        $error = 'Gagal menghapus data lahan';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?lahan');
}
?>
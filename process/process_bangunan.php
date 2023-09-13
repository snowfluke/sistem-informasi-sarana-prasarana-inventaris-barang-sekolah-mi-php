<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['tambah'])){
    $id_bangunan = $_POST['id'];
    $kode_bangunan = $_POST['kode_bangunan'];
    $nama_bangunan = $_POST['nama_bangunan'];
    $jml_lantai_bangunan = $_POST['jml_lantai_bangunan'];
    $luas_bangunan =  $_POST['luas_bangunan'];
    $status_bangunan = $_POST['status_bangunan'];

    $insert = mysqli_query($con,"INSERT INTO tb_bangunan (kode_bangunan, nama_bangunan, jml_lantai_bangunan, luas_bangunan, status_bangunan ) VALUES ('$kode_bangunan', '$nama_bangunan', '$jml_lantai_bangunan', '$luas_bangunan', '$status_bangunan')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data bangunan';
    }else{
        $error = 'Gagal menambahkan data bangunan';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?bangunan');
}

//proses ubah
if(isset($_POST['ubah'])){
    $id = $_POST['id'];
    $kode_bangunan = $_POST['kode_bangunan'];
    $nama_bangunan = $_POST['nama_bangunan'];
    $jml_lantai_bangunan = $_POST['jml_lantai_bangunan'];
    $luas_bangunan =  $_POST['luas_bangunan'];
    $status_bangunan = $_POST['status_bangunan'];

    $sql = "UPDATE tb_bangunan SET  kode_bangunan='$kode_bangunan', nama_bangunan='$nama_bangunan',  jml_lantai_bangunan='$jml_lantai_bangunan', luas_bangunan='$luas_bangunan', status_bangunan='$status_bangunan' WHERE id_bangunan='$id'";
    $update = mysqli_query($con,$sql) or die (mysqli_error($con));
    
    // var_dump($update);die;
    if($update){
        $success = 'Berhasil mengubah data bangunan';
    }else{
        $error = 'Gagal mengubah data bangunan';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?bangunan');
}


//proses hapus
if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    $id = decrypt($_GET['id']);
    $query = mysqli_query($con, "DELETE FROM tb_bangunan WHERE id_bangunan='$id'")or die(mysqli_error($con));
    if($query){
        $success = 'Berhasil menghapus data bangunan';
    }else{
        $error = 'Gagal menghapus data bangunan';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?bangunan');
}
?>
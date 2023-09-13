<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['tambah'])){
    $nama_ruangan = $_POST['nama_ruangan'];
    $keterangan = $_POST['keterangan'];

    $insert = mysqli_query($con,"INSERT INTO tb_ruangan (nama_ruangan, keterangan) VALUES ('$nama_ruangan','$keterangan')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data ruangan';
    }else{
        $error = 'Gagal menambahkan data ruangan';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?ruangan');
}

//proses ubah
if(isset($_POST['ubah'])){
    $id = $_POST['id'];
    $id_ruangan = $_POST['id_ruangan'];
    $nama_ruangan = $_POST['nama_ruangan'];
    $keterangan = $_POST['keterangan'];

    $update = mysqli_query($con,"UPDATE tb_ruangan SET nama_ruangan='$nama_ruangan', keterangan='$keterangan' WHERE id_ruangan='$id'") or die (mysqli_error($con));
    
    // var_dump($update);die;
    if($update){
        $success = 'Berhasil mengubah data ruangan';
    }else{
        $error = 'Gagal mengubah data ruangan';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?ruangan');
}


//proses hapus
if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    $id = decrypt($_GET['id']);
    $query = mysqli_query($con, "DELETE FROM tb_ruangan WHERE id_ruangan='$id'")or die(mysqli_error($con));
    if($query){
        $success = 'Berhasil menghapus data ruangan';
    }else{
        $error = 'Gagal menghapus data ruangan';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?ruangan');
}

?>
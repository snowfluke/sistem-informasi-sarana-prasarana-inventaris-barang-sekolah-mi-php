<?php
session_start();
include ('../config/conn.php');
include ('../config/function.php');

if(isset($_POST['tambah'])){
    $id_barang = $_POST['id_barang'];
    $jenis_transaksi = "pinjam";
    $status = 'belum';
    $jumlah = $_POST['jumlah'];
    $keterangan_transaksi =  $_POST['keterangan_transaksi'];
    $tanggal =  $_POST['tanggal'];
    $stok =  $_POST['stok'];

    if($jumlah > $stok){
        $error = 'Transaksi gagal, jumlah melebihi stok yang ada saat ini!';
        $_SESSION['error'] = $error;
        return header('Location:../?pinjam');
    }


    $insert = mysqli_query($con,"INSERT INTO tb_transaksi (id_barang, jenis_transaksi, status, jumlah, tanggal, keterangan_transaksi) VALUES ('$id_barang', '$jenis_transaksi', '$status', '$jumlah', '$tanggal', '$keterangan_transaksi')") or die (mysqli_error($con));
    if($insert){
        $success = 'Berhasil menambahkan data barang pinjam';
    }else{
        $error = 'Gagal menambahkan data barang pinjam';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?pinjam');
}

//proses ubah
if(isset($_POST['ubah'])){
    $id = $_POST['id'];
    $id_barang = $_POST['id_barang'];
    $jumlah = $_POST['jumlah'];
    $status = $_POST['status'];
    $keterangan_transaksi =  $_POST['keterangan_transaksi'];
    $tanggal =  $_POST['tanggal'];
    $stok =  $_POST['stok'];

    if($jumlah > $stok){
        $error = 'Transaksi gagal, jumlah melebihi stok yang ada saat ini!';
        $_SESSION['error'] = $error;
        return header('Location:../?pinjam');
    }
    
    $update = mysqli_query($con,"UPDATE tb_transaksi SET id_barang='$id_barang', status='$status', jumlah='$jumlah', keterangan_transaksi='$keterangan_transaksi', tanggal='$tanggal' WHERE id_transaksi='$id'") or die (mysqli_error($con));
    
    // var_dump($update);die;
    if($update){
        $success = 'Berhasil mengubah data barang pinjam';
    }else{
        $error = 'Gagal mengubah data barang pinjam';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?pinjam');
}


//proses hapus
if(decrypt($_GET['act'])=='delete' && isset($_GET['id'])!=""){
    $id = decrypt($_GET['id']);
    $query = mysqli_query($con, "DELETE FROM tb_transaksi WHERE id_transaksi='$id'")or die(mysqli_error($con));
    if($query){
        $success = 'Berhasil menghapus data barang pinjam';
    }else{
        $error = 'Gagal menghapus data barang pinjam';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?pinjam');
}

if(decrypt($_GET['act'])=='selesai' && isset($_GET['id'])!=""){
    $id = decrypt($_GET['id']);
    $query = mysqli_query($con, "UPDATE tb_transaksi SET status='selesai' WHERE id_transaksi='$id'")or die(mysqli_error($con));
    if($query){
        $success = 'Berhasil menyelesaikan peminjaman';
    }else{
        $error = 'Gagal menyelesaikan peminjaman';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;
    header('Location:../?pinjam');
}


?>
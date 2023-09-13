<?php
    if(isset($_GET['backup_app'])){
        include ('proses/backup_app.php');
    }
    else if(isset($_GET['backup_db'])){
        include ('proses/backup_db.php');
    }
    else if(isset($_GET['merek'])){
        $master = $merek = true;
        $views = 'views/master/merek.php';
    }
    else if(isset($_GET['kategori'])){
        $master = $barang = true;
        $views = 'views/master/kategori.php';
    }
    else if(isset($_GET['ruangan'])){
        $master = $ruangan = true;
        $views = 'views/master/ruangan.php';
    }
    else if(isset($_GET['kondisi'])){
        $master = $kondisi = true;
        $views = 'views/master/kondisi.php';
    }
    else if(isset($_GET['lahan'])){
        $inventaris = $lahan = true;
        $views = 'views/inventaris/lahan.php';
    }
    else if(isset($_GET['bangunan'])){
        $inventaris = $bangunan = true;
        $views = 'views/inventaris/bangunan.php';
    }
    else if(isset($_GET['barang'])){
        $inventaris = $barang = true;
        $views = 'views/inventaris/barang.php';
    }
    else if(isset($_GET['barang_masuk'])){
        $transaksi = $barang_masuk = true;
        $views = 'views/transaksi/barang_masuk.php';
    }
    else if(isset($_GET['barang_keluar'])){
        $transaksi = $barang_keluar = true;
        $views = 'views/transaksi/barang_keluar.php';
    }
    else if(isset($_GET['pinjam'])){
        $transaksi = $pinjam = true;
        $views = 'views/transaksi/pinjam.php';
    }
    else if(isset($_GET['lap_barang_masuk'])){
        $laporan = $lap_barang_masuk = true;
        $views = 'views/laporan/lap_barang_masuk.php';
    }
    else if(isset($_GET['lap_barang_keluar'])){
        $laporan = $lap_barang_keluar = true;
        $views = 'views/laporan/lap_barang_keluar.php';
    }
     else if(isset($_GET['lap_pinjam'])){
        $laporan = $lap_pinjam = true;
        $views = 'views/laporan/lap_pinjam.php';
    }
    else if(isset($_GET['lap_barang'])){
        $laporan = $lap_barang = true;
        $views = 'views/laporan/lap_barang.php';
    }
    else{
        $home = true;
        $views = 'views/home.php';
    }
?>
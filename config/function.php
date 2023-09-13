<?php
function session_timeout(){
    //lama waktu 30 menit = 1800
    if(isset($_SESSION['LAST_ACTIVITY'])&&(time()-$_SESSION['LAST_ACTIVITY']>1800)){
        session_unset();
        session_destroy();
        include 'conn.php';
        header("Location:".$base_url."login.php");
    }$_SESSION['LAST_ACTIVITY']=time();
}
function delMask( $str ) {
    return (int)implode('',explode('.',$str));
}
function hakAkses( array $a){
    $akses = $_SESSION['role'];
    if(!in_array($akses,$a)){
        // header('Location:?');
        echo '<script>window.location = "?#";</script>';
    }
}
function bulan($bln){
    $bulan = [
        1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];

    return $bulan[$bln];
}
function tahun(){
    return [
        '2020','2021','2022','2023','2024','2025'
    ];
}

function list_barang2(){
    include ('conn.php');
    $query = mysqli_query($con,"SELECT tb_barang.*, (tb_barang.jumlah_awal +  SUM( CASE WHEN tb_transaksi.jenis_transaksi = 'masuk' THEN tb_transaksi.jumlah WHEN tb_transaksi.jenis_transaksi = 'keluar' OR (tb_transaksi.jenis_transaksi = 'pinjam' AND tb_transaksi.status = 'belum') THEN -tb_transaksi.jumlah ELSE 0 END )) AS total_jumlah FROM tb_barang LEFT JOIN tb_transaksi ON tb_transaksi.id_barang = tb_barang.id_barang GROUP BY tb_barang.id_barang ORDER BY tb_barang.nama_barang ASC");
    $opt = "";
    while($row = mysqli_fetch_array($query)){
        $opt .= "<option data-stok=\"".$row['total_jumlah']."\" data-id-merek=\"".$row['id_merek']."\" data-id-kategori=\"".$row['id_kategori']."\"  data-id-ruangan=\"".$row['id_ruangan']."\" data-id-kondisi=\"".$row['id_kondisi']."\" value=\"".$row['id_barang']."\">".$row['nama_barang']."</option>";
    }  
    return $opt; 
}

function list_barang()
{
    include('conn.php');
    $ruangan = mysqli_query($con, "SELECT id_ruangan, nama_ruangan FROM tb_ruangan ORDER BY nama_ruangan ASC");
    $opt     = "";

    while ($row1 = mysqli_fetch_array($ruangan)) {
        $query = mysqli_query($con, "SELECT tb_barang.*, (tb_barang.jumlah_awal +  SUM( CASE WHEN tb_transaksi.jenis_transaksi = 'masuk' THEN tb_transaksi.jumlah WHEN tb_transaksi.jenis_transaksi = 'keluar' OR (tb_transaksi.jenis_transaksi = 'pinjam' AND tb_transaksi.status = 'belum') THEN -tb_transaksi.jumlah ELSE 0 END )) AS total_jumlah FROM tb_barang LEFT JOIN tb_transaksi ON tb_transaksi.id_barang = tb_barang.id_barang WHERE id_ruangan='" . $row1['id_ruangan'] . "'GROUP BY tb_barang.id_barang ORDER BY tb_barang.nama_barang ASC");
        if (mysqli_affected_rows($con) == 0) {
            continue;
        }

        $opt .= "<optgroup label = 'Ruang " . $row1['nama_ruangan'] . "'>";
        while ($row2 = mysqli_fetch_array($query)) {
            $opt .= "<option data-stok=\"" . $row2['total_jumlah'] . "\" data-id-merek=\"" . $row2['id_merek'] . "\" data-id-kategori=\"" . $row2['id_kategori'] . "\"  data-id-ruangan=\"" . $row2['id_ruangan'] . "\" data-id-kondisi=\"" . $row2['id_kondisi'] . "\" value=\"" . $row2['id_barang'] . "\">" . $row2['nama_barang'] . "</option>";
        }
        $opt .= "</optgroup>";
    }
    return $opt;
}

function list_barang_by_ruangan2($id_ruangan)
{
    include('conn.php');
    $query = "SELECT tb_barang.*, (tb_barang.jumlah_awal +  SUM( CASE WHEN tb_transaksi.jenis_transaksi = 'masuk' THEN tb_transaksi.jumlah WHEN tb_transaksi.jenis_transaksi = 'keluar' OR (tb_transaksi.jenis_transaksi = 'pinjam' AND tb_transaksi.status = 'belum') THEN -tb_transaksi.jumlah ELSE 0 END )) AS total_jumlah FROM tb_barang LEFT JOIN tb_transaksi ON tb_transaksi.id_barang = tb_barang.id_barang";

    if ($id_ruangan) {
        $query .= " WHERE tb_barang.id_ruangan = '$id_ruangan'";
    }

    $query .= " GROUP BY tb_barang.id_barang ORDER BY tb_barang.nama_barang ASC";

    $query = mysqli_query($con, $query);

    if (mysqli_num_rows($query) == 0) {
        // No data found, return false
        return false;
    }

    $opt = "<option value=''>-- Semua barang dalam ruangan --</option>";
    $prev = "";
    while ($row = mysqli_fetch_array($query)) {
        $current = strtolower(trim($row['nama_barang']));
        if(!$id_ruangan && (strcmp($prev, $current) == 0)){ continue;
            
        }else{
            if(!$id_ruangan){
                $prev = strtolower(trim($row['nama_barang']));
                $opt .= "<option data-stok=\"" . $row['total_jumlah'] . "\" data-id-merek=\"" . $row['id_merek'] . "\" data-id-kategori=\"" . $row['id_kategori'] . "\"  data-id-ruangan=\"" . $row['id_ruangan'] . "\" data-id-kondisi=\"" . $row['id_kondisi'] . "\" value=\"".$prev."\">" . $row['nama_barang'] . "</option>";
            }else{
                $opt .= "<option data-stok=\"" . $row['total_jumlah'] . "\" data-id-merek=\"" . $row['id_merek'] . "\" data-id-kategori=\"" . $row['id_kategori'] . "\"  data-id-ruangan=\"" . $row['id_ruangan'] . "\" data-id-kondisi=\"" . $row['id_kondisi'] . "\" value=\"" . $row['id_barang'] . "\">" . $row['nama_barang'] . "</option>";
            }
        }        
    }
    return $opt;
}

function list_ruangan_berisi()
{
    include('conn.php');
    $query = mysqli_query($con, "SELECT DISTINCT tb_ruangan.* FROM tb_ruangan INNER JOIN tb_barang ON tb_ruangan.id_ruangan = tb_barang.id_ruangan ORDER BY nama_ruangan ASC");
    $opt   = "";
    while ($row = mysqli_fetch_array($query)) {
        $opt .= "<option value=\"" . $row['id_ruangan'] . "\">" . $row['nama_ruangan'] . "</option>";
    }
    return $opt;
}

function list_barang_by_ruangan($id_ruangan)
{
    include('conn.php');
    $query = mysqli_query($con, "SELECT tb_barang.*, (tb_barang.jumlah_awal +  SUM( CASE WHEN tb_transaksi.jenis_transaksi = 'masuk' THEN tb_transaksi.jumlah WHEN tb_transaksi.jenis_transaksi = 'keluar' OR (tb_transaksi.jenis_transaksi = 'pinjam' AND tb_transaksi.status = 'belum') THEN -tb_transaksi.jumlah ELSE 0 END )) AS total_jumlah FROM tb_barang LEFT JOIN tb_transaksi ON tb_transaksi.id_barang = tb_barang.id_barang WHERE tb_barang.id_ruangan = '$id_ruangan' GROUP BY tb_barang.id_barang ORDER BY tb_barang.nama_barang ASC");

    if (mysqli_num_rows($query) == 0) {
        // No data found, return false
        return false;
    }

    $opt = "<option value=''>-- Pilih Barang --</option>";
    while ($row = mysqli_fetch_array($query)) {
        $opt .= "<option data-stok=\"" . $row['total_jumlah'] . "\" data-id-merek=\"" . $row['id_merek'] . "\" data-id-kategori=\"" . $row['id_kategori'] . "\"  data-id-ruangan=\"" . $row['id_ruangan'] . "\" data-id-kondisi=\"" . $row['id_kondisi'] . "\" value=\"" . $row['id_barang'] . "\">" . $row['nama_barang'] . "</option>";
    }
    return $opt;
}

function list_merek(){
    include ('conn.php');
    $query = mysqli_query($con,"SELECT * FROM tb_merek ORDER BY nama_merek ASC");
    $opt = "";
    while($row = mysqli_fetch_array($query)){
        $opt .= "<option value=\"".$row['id_merek']."\">".$row['nama_merek']."</option>";
    }  
    return $opt; 
}

function list_kategori(){
    include ('conn.php');
    $query = mysqli_query($con,"SELECT * FROM tb_kategori ORDER BY nama_kategori ASC");
    $opt = "";
    while($row = mysqli_fetch_array($query)){
        $opt .= "<option value=\"".$row['id_kategori']."\">".$row['nama_kategori']."</option>";
    }  
    return $opt; 
}

function list_ruangan(){
    include ('conn.php');
    $query = mysqli_query($con,"SELECT * FROM tb_ruangan ORDER BY nama_ruangan ASC");
    $opt = "";
    while($row = mysqli_fetch_array($query)){
        $opt .= "<option value=\"".$row['id_ruangan']."\">".$row['nama_ruangan']."</option>";
    }  
    return $opt; 
}


function list_kondisi(){
    include ('conn.php');
    $query = mysqli_query($con,"SELECT * FROM tb_kondisi ORDER BY nama_kondisi ASC");
    $opt = "";
    while($row = mysqli_fetch_array($query)){
        $opt .= "<option value=\"".$row['id_kondisi']."\">".$row['nama_kondisi']."</option>";
    }  
    return $opt; 
}


function encrypt($str) {
return base64_encode($str);
}
function decrypt($str) {
return base64_decode($str);
}

function base_url(){
    $base_url= ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    $base_url.= "://".$_SERVER['HTTP_HOST'];
    $base_url.= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
    return $base_url;
}
?>
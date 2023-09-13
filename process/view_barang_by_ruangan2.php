<?php
session_start();

include('../config/conn.php');
include('../config/function.php');
$id_ruangan = $_POST['id_ruangan'];

$list = list_barang_by_ruangan2($id_ruangan);

$data = [
    'result' => $list
];

echo json_encode($data);

?>
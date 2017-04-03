<?php

require_once '../optional/mysqli.php';

$id = $_POST['id'];
$persediaan = (int) $_POST['persediaan'];
$total_harga = $_POST['total_harga'];

echo $sql = "INSERT INTO pembelian_stok
        (kode_barang, penambahan_stok, total_pembelian, waktu)
        VALUES ('{$id}', '{$persediaan}', '{$total_harga}', NOW())";
$query = query( $sql );

if ( $query ) {
    $sql = "UPDATE barang SET persediaan=persediaan + $persediaan WHERE id='{$id}'";
    $query = query( $sql );
    if ( $query ) {
        header( "location:http://localhost/SIA/public/gudang/list.php" );
    }
}

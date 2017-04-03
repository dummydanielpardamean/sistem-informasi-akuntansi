<?php

require_once '../../connection.php';

if ( isset( $_GET['id'] ) ) {
    $id = $_GET['id'];
}

$sql = "DELETE FROM barang WHERE id='{$id}'";
$query = mysqli_query( $databaseConnection, $sql );

if ( $query ) {
    $sql = "DELETE FROM spesifikasi WHERE id_barang='{$id}'";
    $query = mysqli_query( $databaseConnection, $sql );
    if ( $query ) {
        header( "location:http://localhost/SIA/public/gudang/list.php" );
    }
}

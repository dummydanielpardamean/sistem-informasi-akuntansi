<?php

require_once '../../connection.php';
if ( isset( $_GET['id'] ) ) {
    $id = $_GET['id'];
    $sql = "DELETE FROM transaksi WHERE id='{$id}'";

    if ( mysqli_query( $databaseConnection, $sql ) ) {
        header( "location:http://localhost/SIA/public/operator/list.php" );
    }
}
?>

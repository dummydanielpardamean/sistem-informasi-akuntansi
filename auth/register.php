<?php

require_once '../optional/mysqli.php';

if ( isset( $_POST ) ):
    $ID_Anggota = $_POST['id_anggota'];
    $password = md5( $_POST['password'] );
endif;

$sql = "INSERT INTO user (id_anggota, password) VALUES ('{$ID_Anggota}', '{$password}')";

query( $sql );

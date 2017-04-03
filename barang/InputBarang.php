<?php

require_once '../optional/mysqli.php';

if (isset($_POST)):
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $vendor = $_POST['vendor'];
    $harga = $_POST['harga'];
    $persediaan = $_POST['persediaan'];
    $total_pembelian = $_POST['total_pembelian'];
endif;

if (isset($_POST['layar']) && isset($_POST['kamera']) && isset($_POST['baterai'])):
    $layar = $_POST['layar'];
    $kamera = $_POST['kamera'];
    $baterai = $_POST['baterai'];
endif;

$sql = "SELECT id FROM barang WHERE id='{$id}'";
$query = query($sql);

// Pengecekan kode barang, apakah sudah ada ditabase.
if ((num_rows($query) > 0)):
    echo 'Kode barang sudah dipakai';
else:

    // Menyimpan data barang kedalam tabel barang.
    $sql = "INSERT INTO barang (id, nama, vendor, harga, persediaan)
		            VALUES ('{$id}', '{$nama}', '{$vendor}', '{$harga}', '{$persediaan}')";

    $query = query($sql);

    if ($query && $layar !== '' && $kamera !== '' && $baterai !== '') {
        $sql = "INSERT INTO spesifikasi (id_barang, layar, kamera, baterai)
		                VALUES ('{$id}', '{$layar}', '{$kamera}', '{$baterai}')";
        $query = query($sql);

        $sql = "INSERT INTO pembelian_stok (kode_barang, penambahan_stok, total_pembelian, waktu)
		        VALUES ('{$id}', '{$persediaan}', '{$total_pembelian}', NOW())";
        $query = query($sql);
    }

    // Jika penyimpanan berhasil, redirect.
    if ($query) {
        header('location:http://localhost/SIA/public/gudang/');
    }

endif;

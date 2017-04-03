<?php

require_once '../optional/mysqli.php';

// Sebagai unik faktur menggunakan waktu saat proses terjadi.
$uniqueFaktur = date('dmy', time());

if (isset($_POST)):

    $nama_pembeli = $_POST['nama_pembeli'];
    $form = (int) $_POST['total-form'];

    // Mengecek id paling akhir, gabungkan $uniqueFaktur dengan id terakhir menjadi $nomorFaktur
    $sql = 'SELECT id FROM transaksi ORDER BY id DESC LIMIT 1';
    $query = query($sql);
    if (num_rows($query) == 0) {
        $nomorFaktur = $uniqueFaktur . 1;
    } else {
        $nomorFaktur = $uniqueFaktur . ((int) getAssoc($query)['id'] + 1);
    }

endif;

$insertSQL = 'INSERT INTO transaksi (nomor_faktur, nama_pembeli, id_barang, total_pembelian, waktu) VALUES ';

// looping insert data sesuai dengan banyak form yang digenerate.
for ($i = 0; $i < $form; ++$i) {
    $id_barang = $_POST['id_barang'][$i];
    $total_pembelian = (int) $_POST['total_pembelian'][$i];
    $values = "('{$nomorFaktur}', '{$nama_pembeli}', '{$id_barang}', $total_pembelian, NOW())";
    $sql = $insertSQL . $values;
    $query = query($sql);

    $sql = "UPDATE barang SET persediaan = persediaan - $total_pembelian WHERE id = '{$id_barang}'";
    $query = query($sql);
}

if ($query):

    if ($query) {
        header("location:http://localhost/SIA/public/operator/notaPembelian.php?nomor_faktur={$nomorFaktur}");
    }

endif;

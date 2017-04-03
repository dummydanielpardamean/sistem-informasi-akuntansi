<?php
require_once '../../connection.php';
define('title', 'Owner | Laporan Penjualan Hari Ini');
$time = time();
$day = date('Y-m-d', $time) . ' 00:00:01';
$sql = "SELECT * FROM transaksi, barang WHERE waktu >= '{$day}' AND waktu <= NOW() AND transaksi.id_barang=barang.id";
$query = mysqli_query($databaseConnection, $sql);
$no = 1;
?>
<?php include_once 'partials/_head.php';?>
<?php include_once 'partials/_nav.php';?>
<div class="col-md-10 main-content">
    <h3 class="text-center">Laporan Penjualan Hari Ini</h3>
    <table class="table table-striped table-hover">
        <tr class="lpran">
            <th>No</th>
            <th>Faktur</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Total</th>
            <th>Waktu</th>
        </tr>
        <?php while ($assoc = mysqli_fetch_assoc($query)): ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><a href="http://localhost/SIA/public/operator/notaPembelian.php?nomor_faktur=<?php echo $assoc['nomor_faktur'] ?>"><?php echo $assoc['nomor_faktur'] ?></a></td>
                <td><?php echo $assoc['total_pembelian'] ?></td>
                <td><?php echo 'Rp ' . number_format($assoc['harga'], 0, ',', '.') ?></td>
                <td><?php echo 'Rp ' . number_format($assoc['total_pembelian'] * $assoc['harga'], 0, ',', '.') ?></td>
                <td><?php echo date('H:i:s', strtotime($assoc['waktu'])) ?></td>
            </tr>
        <?php endwhile;?>
    </table>
</div>
<?php include_once 'partials/_foot.php';?>

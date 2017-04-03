<?php
require_once '../../connection.php';
define('title', 'Operator | Daftar Pembelian');

$sql = 'SELECT DISTINCT  transaksi.nomor_faktur#, transaksi.id, transaksi.nama_pembeli, transaksi.total_pembelian, transaksi.waktu,
        #barang.nama, barang.harga
        FROM transaksi, barang
        WHERE transaksi.id_barang=barang.id';

$query = mysqli_query($databaseConnection, $sql);

$no = 1;
?>
<?php include_once 'partials/_head.php';?>
<?php include_once 'partials/_nav.php';?>
<div class="col-md-10 main-content">
    <div class="col-md-4 col-md-offset-4">
        <h4 class="text-center">Daftar Transaksi</h4>
        <table class="table table-bordered table-condesed">
            <tr>
                <td class="text-center">No</td>
                <td class="text-center">Nomor Faktur</td>
            </tr>
            <?php while ($assoc = mysqli_fetch_assoc($query)): ?>
            <tr>
                <td class="text-center"><?php echo $no++ ?></td>
                <td class="text-center">
                    <a style="color: #333" href="http://localhost/SIA/public/operator/notaPembelian.php?nomor_faktur=<?php echo $assoc['nomor_faktur'] ?>"><?php echo $assoc['nomor_faktur'] ?></a>
                </td>
            </tr>
            <?php endwhile;?>
        </table>
    </div>
</div>
<?php include_once 'partials/_foot.php';?>

<?php
require_once '../../connection.php';
define('title', 'Operator | Nota Pembelian');

if ($_GET['nomor_faktur']) {

    $nomor_faktur = $_GET['nomor_faktur'];
    $sql = "SELECT transaksi.nomor_faktur, transaksi.nama_pembeli, transaksi.total_pembelian, barang.nama, barang.harga
		    FROM transaksi, barang
		    WHERE nomor_faktur='{$nomor_faktur}' AND transaksi.id_barang=barang.id";

    $query = mysqli_query($databaseConnection, $sql);
    $no = 1;
} else {
    header("location:http://localhost/SIA/public/operator/list.php");
}
$hargatotal = 0;

?>

<?php include_once 'partials/_head.php';?>
<?php include_once 'partials/_nav.php';?>
<div class="col-md-10 main-content">
	<h1>Nomor Faktur : <?php echo $nomor_faktur ?></h1>
    <table class="table table-condensed table-bordered">
    	<tr>
    		<td class="text-center">No</td>
            <td class="text-center">Nama Pembeli</td>
            <td class="text-center">Nama Barang</td>
    		<td class="text-center">Total pembelian</td>
    		<td class="text-center">Harga Perbuah</td>
    		<td class="text-center">Harga Pembelian</td>
    	</tr>
    	<?php while ($assoc = mysqli_fetch_assoc($query)): ?>
    	<tr>
    		<td class="text-center"><?php echo $no++ ?></td>
            <td class="text-center"><?php echo $assoc['nama_pembeli'] ?></td>
    		<td><?php echo $assoc['nama'] ?></td>
    		<td class="text-center"><?php echo $assoc['total_pembelian'] ?></td>
    		<td class="text-center"><?php echo 'Rp ' . number_format($assoc['harga'], 0, ",", ".") ?></td>
    		<td class="text-center"><?php echo 'Rp ' . number_format($hargatotal += $assoc['harga'] * $assoc['total_pembelian'], 0, ",", ".") ?></td>
    	</tr>
    	<?php endwhile;?>
    	<tr>
    		<td class="text-center" colspan="5">Total</td>
    		<td class="text-center"><?php echo 'Rp ' . number_format($hargatotal, 0, ",", ".") ?></td>
    	</tr>
    </table>
</div>
<?php include_once 'partials/_foot.php';?>

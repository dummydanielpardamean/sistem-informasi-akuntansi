<?php
define( 'title', 'Gudang | List Barang' );
require_once '../../connection.php';

$sql = 'SELECT * FROM barang';
$query = mysqli_query( $databaseConnection, $sql );

$no = 1;
?>
<?php include_once 'partials/_head.php'; ?>
<?php include_once 'partials/_nav.php'; ?>
<div class="col-md-10 main-content">
    <h4 class="text-center">Daftar Handphone</h4>
    <table class="table table-bordered table-condensed">
        <tr>
            <td class="text-center">No</td>
            <td class="text-center">Kode Barang</td>
            <td class="text-center">Nama Barang</td>
            <td class="text-center">Vendor Barang</td>
            <td class="text-center">Harga Barang</td>
            <td class="text-center">Persediaan Barang</td>
            <td class="text-center">Act</td>
        </tr>
        <?php while ( $assoc = mysqli_fetch_assoc( $query ) ): ?>
            <tr>
                <td class="text-center"><?php echo $no++ ?></td>
                <td class="text-center"><?php echo $assoc['id'] ?></td>
                <td><?php echo $assoc['nama'] ?></td>
                <td><?php echo $assoc['vendor'] ?></td>
                <td><?php echo 'Rp ' . number_format( $assoc['harga'], 0, ",", "." ) ?></td>
                <td class="text-center"><?php echo $assoc['persediaan'] ?></td>
                <td class="text-center">
                    <a class="edit" href="edit.php?id=<?php echo $assoc['id'] ?>"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a class="remove" href="hapus.php?id=<?php echo $assoc['id'] ?>"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
<?php include_once 'partials/_foot.php'; ?>

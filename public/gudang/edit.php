<?php
define( 'title', 'Gudang | List Barang' );
require_once '../../connection.php';

if ( isset( $_GET['id'] ) ) {
    $id = $_GET['id'];
}

$sql = "SELECT * FROM barang, spesifikasi WHERE barang.id='{$id}' AND spesifikasi.id_barang='{$id}' LIMIT 1";
$query = mysqli_query( $databaseConnection, $sql );
$assoc = mysqli_fetch_assoc( $query );
?>

<?php include_once 'partials/_head.php'; ?>
<?php include_once 'partials/_nav.php'; ?>

<div class="col-md-10 main-content">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form action="http://localhost/SIA/barang/InputBarang.php" method="post">
                <input class="form-control" type="text" name="nama" placeholder="Nama Barang" value="<?php echo $assoc['nama'] ?>" />
                <input class="form-control" type="text" name="vendor" placeholder="Vendor Barang" value="<?php echo $assoc['vendor'] ?>" />
                <input class="form-control" type="text" name="harga" placeholder="Harga Barang" value="<?php echo $assoc['harga'] ?>" />
                <input class="form-control" type="text" name="persediaan" placeholder="Persediaan Barang" value="<?php echo $assoc['persediaan'] ?>" />
                <input class="form-control" type="text" name="layar" placeholder="Layar" value="<?php echo $assoc['layar'] ?>" />
                <input class="form-control" type="text" name="kamera" placeholder="Kamera" value="<?php echo $assoc['kamera'] ?>" />
                <input class="form-control" type="text" name="baterai" placeholder="Baterai" value="<?php echo $assoc['baterai'] ?>" />
                <button class="btn btn-primary btn-block" type="submit" name="button">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?php include_once 'partials/_foot.php'; ?>

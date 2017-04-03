<?php
define( 'title', 'Gudang | Tambah Persediaan Barang' );
require_once '../../connection.php';

$sql = 'SELECT id, nama FROM barang';
$query = mysqli_query( $databaseConnection, $sql );

$no = 1;
?>
<?php include_once 'partials/_head.php'; ?>
<?php include_once 'partials/_nav.php'; ?>
<div class="col-md-10 main-content">
    <h4 class="text-center">Tambah Persediaan Handphone</h4>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form class="input-form" action="http://localhost/SIA/barang/tambah_barang.php" method="post">
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="id">Kode Barang</label>
                    </div>
                    <div class="col-md-8">
                        <select class="form-control" name="id" id="id">
                            <?php while ( $assoc = mysqli_fetch_assoc( $query ) ): ?>
                                <option value="<?php echo $assoc['id'] ?>"><?php echo $assoc['nama'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="persediaan">Persediaan Barang</label>
                    </div>
                    <div class="col-md-8">
                        <input class="form-control" id="persediaan" type="text" name="persediaan" placeholder="Persediaan Barang" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="total_harga">Total Harga Pembelian Stok Barang</label>
                    </div>
                    <div class="col-md-8">
                        <input class="form-control" id="total_harga" type="text" name="total_harga" placeholder="Total Harga" />
                    </div>
                </div>
                <p class="text-center">
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </p>
            </form>
        </div>
    </div>
</div>
<?php include_once 'partials/_foot.php'; ?>

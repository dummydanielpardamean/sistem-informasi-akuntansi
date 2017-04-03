<?php
define( 'title', 'Gudang | Input Barang' );
require_once '../../connection.php';

$sql = 'SELECT * FROM barang';
$query = mysqli_query( $databaseConnection, $sql );

$no = 1;
?>
<?php include_once 'partials/_head.php'; ?>
<?php include_once 'partials/_nav.php'; ?>
<div class="col-md-10 main-content">
    <h4 class="text-center">Input Handphone</h4>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form class="input-form" action="http://localhost/SIA/barang/InputBarang.php" method="post">
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="id">Kode Barang</label>
                    </div>
                    <div class="col-md-8">
                        <input class="form-control" id="id" type="text" name="id" placeholder="Kode Barang" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="nama">Nama Barang</label>
                    </div>
                    <div class="col-md-8">
                        <input class="form-control" id="nama" type="text" name="nama" placeholder="Nama Barang" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="vendor">Vendor Barang</label>
                    </div>
                    <div class="col-md-8">
                        <input class="form-control" id="vendor" type="text" name="vendor" placeholder="Vendor Barang" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="harga">Harga Barang</label>
                    </div>
                    <div class="col-md-8">
                        <input class="form-control" id="harga" type="text" name="harga" placeholder="Harga Barang" />
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
                        <label for="layar">Layar</label>
                    </div>
                    <div class="col-md-8">
                        <input class="form-control" id="layar" type="text" name="layar" placeholder="Layar" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="kamera">Kamera</label>
                    </div>
                    <div class="col-md-8">
                        <input class="form-control" id="kamera" type="text" name="kamera" placeholder="Kamera" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="baterai">Baterai</label>
                    </div>
                    <div class="col-md-8">
                        <input class="form-control" id="baterai" type="text" name="baterai" placeholder="Baterai" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-4">
                        <label for="total_pembelian">Total Harga Pembelian Stok Barang</label>
                    </div>
                    <div class="col-md-8">
                        <input class="form-control" id="total_pembelian" type="text" name="total_pembelian" placeholder="Total Harga" />
                    </div>
                </div>
                <p class="text-center">
                    <button class="btn btn-primary" type="submit" name="button">Simpan</button>
                </p>
            </form>
        </div>
    </div>
</div>
<?php include_once 'partials/_foot.php'; ?>

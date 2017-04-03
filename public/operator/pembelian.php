<?php
require_once '../../connection.php';
define( 'title', 'Operator | Pembelian' );

$sql = 'SELECT id, nama FROM barang';

$query = mysqli_query( $databaseConnection, $sql );

$index = 0;
while ( $assoc = mysqli_fetch_assoc( $query ) ) {
    $kumpulanBarang[$index]['id'] = $assoc['id'];
    $kumpulanBarang[$index]['nama'] = $assoc['nama'];
    ++$index;
}
?>
<?php include_once 'partials/_head.php'; ?>
<?php include_once 'partials/_nav.php'; ?>
<div class="col-md-10 main-content">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <?php
            if ( isset( $_GET['form'] ) && $_GET['form'] !== '' ) {
                $form = $_GET['form'];
                include_once 'formPembelian.php';
            } else {
                include_once 'formGetForm.php';
            }
            ?>
        </div>
    </div>
</div>
<?php include_once 'partials/_foot.php'; ?>

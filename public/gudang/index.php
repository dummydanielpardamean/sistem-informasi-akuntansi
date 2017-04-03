<?php
define( 'title', 'Gudang | Home' );
require_once '../../connection.php';

$sql = 'SELECT * FROM barang';
$query = mysqli_query( $databaseConnection, $sql );

$no = 1;
?>

<?php include_once 'partials/_head.php'; ?>
<?php include_once 'partials/_nav.php'; ?>
<div class="col-md-10 main-content">
    <h1 class="text-center">Gudang</h1>
</div>
<?php include_once 'partials/_foot.php'; ?>

<?php
require_once '../../connection.php';
define( 'title', 'Owner | Laporan Laba/Rugi' );

$tanggal_pertama = date( 'Y-m', time() ) . '-01 00:00:01';
$tanggal_akhir = date( 'Y-m-d', (strtotime( $tanggal_pertama ) + 2592000 ) ) . ' 00:00:01';
$sql = "SELECT SUM(total_pembelian) FROM pembelian_stok
        WHERE waktu >= '{$tanggal_pertama}' AND waktu <= '{$tanggal_akhir}'
        ORDER BY waktu DESC";
$query = mysqli_query( $databaseConnection, $sql );
$assoc = mysqli_fetch_assoc( $query );

$laba_rugi['pengeluaran'] = $assoc['SUM(total_pembelian)'] == NULL ? 0 : $assoc['SUM(total_pembelian)'];

$sql = "SELECT total_pembelian, id_barang FROM transaksi
        WHERE waktu >= '{$tanggal_pertama}' AND waktu <= '{$tanggal_akhir}'
        ORDER BY waktu DESC";
$query = mysqli_query( $databaseConnection, $sql );

$pendapatan = 0;
while ( $assoc = mysqli_fetch_assoc( $query ) ) {
    $id = $assoc['id_barang'];
    $arr = mysqli_fetch_assoc( mysqli_query( $databaseConnection, "SELECT harga FROM barang WHERE id='{$id}'" ) );
    $pendapatan += (int) $assoc['total_pembelian'] * (int) $arr['harga'];
}
// var_dump($assoc);
// die();

$laba_rugi['pendapatan'] = $pendapatan == NULL ? 0 : $pendapatan;

$laba_rugi['laba_rugi'] = $laba_rugi['pendapatan'] - $laba_rugi['pengeluaran'];
?>

<?php include_once 'partials/_head.php'; ?>
<?php include_once 'partials/_nav.php'; ?>
<div class="col-md-10 main-content">
    <div class="col-md-6 col-md-offset-3">
        <h3 class="text-center">Laporan Laba/Rugi <?php echo date( "F", strtotime( $tanggal_pertama ) ) . "-" . date( "F", strtotime( $tanggal_akhir ) ) ?> </h3>
        <table class="table table-bordered">
            <tr>
                <td>Keterangan</td>
                <td>Nominal</td>
            </tr>
            <tr>
                <td>Pengeluaran</td>
                <td><?php echo 'Rp ' . number_format( $laba_rugi['pengeluaran'], 0, ",", "." ) ?></td>
            </tr>
            <tr>
                <td>Pendapatan</td>
                <td><?php echo 'Rp ' . number_format( $laba_rugi['pendapatan'], 0, ",", "." ) ?></td>
            </tr>
            <tr>
                <td>Laba/Rugi</td>
                <td><?php echo 'Rp ' . number_format( $laba_rugi['laba_rugi'], 0, ",", "." ) ?></td>
            </tr>
        </table>
    </div>
</div>
<?php include_once 'partials/_foot.php'; ?>

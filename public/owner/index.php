<?php
session_start();
define( 'title', 'Owner | Home' );

if ( !isset( $_SESSION['id'] ) && !isset( $_SESSION['nama'] ) && !$_SESSION['jabatan'] ):
    header( 'location:http://localhost/SIA/public' );
elseif ( $_SESSION['jabatan'] !== 'owner' ):
    $session = $_SESSION['jabatan'];
    header( "location:http://localhost/SIA/public/{$session}" );
endif;
?>
<?php include_once 'partials/_head.php'; ?>
<?php include_once 'partials/_nav.php'; ?>
<div class="col-md-10 main-content">
    <h1 class="text-center">Owner</h1>
</div>
<?php include_once 'partials/_foot.php'; ?>

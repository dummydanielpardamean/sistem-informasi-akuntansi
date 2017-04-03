<?php

require_once '../optional/mysqli.php';

# Cek Request post
if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) && $_POST['username'] !== '' && $_POST['password'] !== '' ):

    # Set variabel
    $ID_Anggota = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username='{$ID_Anggota}' AND password='{$password}'";

    $query = query( $sql );

    # Jika numrows dari hasil query > 0, ada username yang cocok
    if ( num_rows( $query ) > 0 ):

        # Ubah hasil query menjadi object
        $object = getObject( $query );

        # Set session yang diperlukan
        $_SESSION['id'] = $object->id;
        $_SESSION['nama'] = $object->nama;
        $_SESSION['jabatan'] = $object->jabatan;

        # Redirect sesuai dengan jabatan username
        if ( $object->jabatan === "gudang" ):
            header( "location:http://localhost/SIA/public/gudang/" );
        elseif ( $object->jabatan === "admin" ):
            header( "location:http://localhost/SIA/public/admin/" );
        elseif ( $object->jabatan === "owner" ):
            header( "location:http://localhost/SIA/public/owner/" );
        elseif ( $object->jabatan === "operator" ):
            header( "location:http://localhost/SIA/public/operator/" );
        endif;

    endif;

else:

    # Redirect ke home jika tidak ada request post
    header( "location:http://localhost/SIA/public/" );

endif;

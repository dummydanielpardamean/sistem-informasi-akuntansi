<?php

require_once '../connection.php';

function query($sql)
{
    global $databaseConnection;
    return mysqli_query($databaseConnection, $sql);
}

function num_rows($args)
{
    return mysqli_num_rows($args);
}

function getObject($args)
{
    return mysqli_fetch_object($args);
}

function getAssoc($args)
{
    return mysqli_fetch_assoc($args);
}

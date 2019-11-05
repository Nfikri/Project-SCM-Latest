<?php

    define("DB_USER", 'root');
    define("DB_PASSWORD", '');
    define("DB_HOST", 'localhost');
    define("DB_NAME", 'yasui');

    $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$dbc) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    mysqli_set_charset($dbc, 'utf8');

?>


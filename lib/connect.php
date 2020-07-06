<?php
    // Create connection    
    $conn = mysqli_connect($core_db_hostname, $core_db_username, $core_db_password, $core_db_name);

    $mysqli = new mysqli();

    @$mysqli->connect ( $core_db_hostname,  $core_db_username, $core_db_password,  $core_db_name );
    if ($mysqli->connect_error) {
        $TITLE = $mysqli->connect_error;

    $FATAL_ERROR = "#{$mysqli->connect_errno} - {$mysqli->connect_error}";
        echo $FATAL_ERROR;
    }
    
$mysqli -> set_charset("utf8");
?>
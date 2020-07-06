<?php 
    include 'lib/config.php';
    include 'lib/connect.php';
    include 'lib/functions.php';
    $id = decodeStr($_POST['id']);
    $sql_query = "DELETE FROM ".$config['route']['db']." WHERE ".$config['route']['db']."_id = ".$id."     ";
    $result = db_query($conn , $sql_query);
    echo 'success';
?>
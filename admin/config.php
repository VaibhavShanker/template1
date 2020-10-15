<?php

    $siteurl="http://localhost/traning/temp/admin/";

    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="tempdb";

    $conn=new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {

    die("Connection Failed: ".$conn->connect_error);
}



?>
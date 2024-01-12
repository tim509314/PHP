<?php
date_default_timezone_set("Asia/Hong_Kong");
$dbConnection = mysqli_connect("localhost", "root", "", "db_jobportal");

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: ". mysqli_connect_errno();
    exit();
}

/* echo "Success!"; */

mysqli_set_charset($dbConnection, "utf8");

?>
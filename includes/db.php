<?php
define("DBHOST","127.0.0.1");
define("DBUSER","root");
define("DBPASS","");
define("DBNAME","nursing_system");
$connection = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
if(mysqli_connect_errno()){
    die("Database Connection failed ".mysqli_connect_error());
}

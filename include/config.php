<?php
session_start();
date_default_timezone_set("Asia/kolkata");
// $servername='localhost';
// $username='demo_sunil_trader_user';
// $password='Z2}CS4GAmck9';
// $database='demo_sunil_traders';

$servername='localhost';
$username='local_sunil';
$password='Sunil@12345';
$database='local_sunil';

$conn=mysqli_connect($servername,$username,$password,$database);
// if($conn) { echo "ok"; }
// else { die('connection failed'); }
?>
<?php
// Initialize the session
session_start();

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'odev_final');

date_default_timezone_set('Europe/Istanbul');
$login_date = date('Y-m-d H:i:s');
$user_id = $_SESSION["id"];
$ipAddr =  $_SESSION['ip'];
$log_tip = "Cikis";


$query = "INSERT INTO user_logs (`user_id`, `login_date`, `ip_addr`, `log_tip`) VALUES( '$user_id', '$login_date', '$ipAddr', '$log_tip')";
$query_run = mysqli_query($connection, $query);



// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: login.php");
exit;
?>
<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}


$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'odev_final');

$currentUser = $_SESSION["id"];


$query = "SELECT * FROM user_logs WHERE user_id = '$currentUser' ";
$query_run = mysqli_query($connection, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Loglar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a href="index.php" class="navbar-brand active ">Anasayfa</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="addstuff.php" class="nav-item nav-link">Kişi Ekle</a>
                <a href="stuffList.php" class="nav-item nav-link">Kişileri Listele</a>
                <a href="log.php" class="nav-item nav-link">Loglar</a>
                <a href="kullanici.php" class="nav-item nav-link">Kullancı Bilgileri</a>
            </div>
            <div class="navbar-nav ml-auto">
                <a href="logout.php" class="btn btn-danger ml-3">Çıkış Yap</a>
            </div>
        </div>
    </nav>
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><b><b>Log Defteri </b></b></li>
        <li class="list-group-item">Kullancı: <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></li>
    </ul>

    <div class="container" >

<div class="card">
    <div class="card-body">

    <table id="datatableid" class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>                                
                                <th scope="col"> Kullanıcı ID</th>
                                <th scope="col"> Tarih </th>
                                <th scope="col"> IP Adresi </th>
                                <th scope="col"> Log Tipi </th>
                        </thead>
                        <?php
                        
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                        <tbody>
                            <tr>
                                <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['user_id']; ?> </td>
                                <td> <?php echo $row['login_date']; ?> </td>
                                <td> <?php echo $row['ip_addr']; ?> </td>
                                <td> <?php echo $row['log_tip']; ?> </td>
                            </tr>
                        </tbody>
                        <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>
                    </table>
                    </div>
            </div>
    </div>

</body>

</html>
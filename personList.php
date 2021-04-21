<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
include("config.php");
//$sorgu=$config->query("SELECT * FROM personeller");

$query = "SELECT * FROM personeller";

$result = mysql_query($success, $query);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
            text-align: center;
            justify-content: center;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a href="#" class="navbar-brand active ">Anasayfa</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="#" class="nav-item nav-link">Kişi Ekle</a>
                <a href="#" class="nav-item nav-link">Kişileri Listele</a>
            </div>
            <div class="navbar-nav ml-auto">
                <a href="logout.php" class="btn btn-danger ml-3">Çıkış Yap</a>
            </div>
        </div>
    </nav>

    <p>
        ------------------------------------------------------------------------------------------------------------------------------------------------------------------
    </p>

    <table align="center" border="1px" style="width:800px; line-height:40px;">
        <tr>
            <th colspan="4">
                <h2>Personel Bilgileri</h2>
            </th>
        </tr>
        <t>
            <th>ID</th>
            <th>TC no</th>
            <th>Adı</th>
            <th>Soyadı</th>
            <th>Mesleği</th>
            <th>Email</th>
            <th>Telefon</th>
            <th>Cinsiyet</th>
            <th>Doğum Tarihi</th>
            <th>Kayıt Tarihi</th>
            <th>Adres</th>
            <th>Hakkında</th>
        </t>
        <?php
        while ($rows = mysqli_fetch_assoc($result)) {
        ?>
            <tr>
                <td><?php echo $rows['ıd']; ?></td>
                <td><?php echo $rows['tc']; ?></td>
                <td><?php echo $rows['ad']; ?></td>
                <td><?php echo $rows['soyad']; ?></td>
                <td><?php echo $rows['meslek']; ?></td>
                <td><?php echo $rows['mail']; ?></td>
                <td><?php echo $rows['telefon']; ?></td>
                <td><?php echo $rows['cinsiyet']; ?></td>
                <td><?php echo $rows['dogum_tarihi']; ?></td>
                <td><?php echo $rows['sistem_kayit']; ?></td>
                <td><?php echo $rows['adres']; ?></td>
                <td><?php echo $rows['kisi_bilgi']; ?></td>
            </tr>
        <?php
        }
        ?>

    </table>

</body>

</html>
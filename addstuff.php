<?php

// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}


$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'odev_1');


if (isset($_POST['insertdata'])) {

    $tc = $_POST['tc'];
    $ad = $_POST['ad'];
    $soyad = $_POST['soyad'];
    $meslek = $_POST['meslek'];
    $mail = $_POST['mail'];
    $telefon = $_POST['telefon'];
    $cinsiyet = $_POST['cinsiyet'];
    $dogum_tarihi = $_POST['dogum_tarihi'];
    $adres = $_POST['adres'];
    $kisi_bilgi = $_POST['kisi_bilgi'];


    $query = "INSERT INTO personeller (`tc`, `ad`, `soyad`, `meslek`, `mail`, `telefon`, `cinsiyet`, `dogum_tarihi`, `adres`, `kisi_bilgi`)
     VALUES ('$tc','$ad','$soyad','$meslek','$mail','$telefon','$cinsiyet', '$dogum_tarihi', '$adres', '$kisi_bilgi')";
    $squery_run = mysqli_query($connection, $query);


    if ($squery_run) {
        echo '<script> alert("Data Saved");</script>';
        header('Location:addstuff.php');
    } else {
        echo '<script> alert("Data Not Saved");</script>';
    }

    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personel Bilgileri</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <a href="#" class="navbar-brand active ">Anasayfa</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="addstuff.php" class="nav-item nav-link">Kişi Ekle</a>
                <a href="stuffList.php" class="nav-item nav-link">Kişileri Listele</a>
            </div>
            <div class="navbar-nav ml-auto">
                <a href="logout.php" class="btn btn-danger ml-3">Çıkış Yap</a>
            </div>
        </div>
    </nav>


    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-12">
                  
                    <h2> PHP - CRUD : ADD Data </h2>
                    <hr>
                    <!-- <form action="" method="post">
                        <div class="form-group">
                            <label for=""> First Name </label>
                            <input type="text" name="username" class="form-control" placeholder="Enter First Name" required>
                        </div>
                        <div class="form-group">
                            <label for=""> password </label>
                            <input type="text" name="password" class="form-control" placeholder="Enter Last Name" required>
                        </div>

                        <button type="submit" name="insert" class="btn btn-primary"> Save Data </button>

                        <a href="index.php" class="btn btn-danger"> BACK </a>
                    </form> -->

                    <form action="" method="POST">
                    <div class="modal-body">

                        <div class="form-group">
                            <label>Tc No</label>
                            <input type="text" name="tc" class="form-control" placeholder="TC No Giriniz">
                        </div>
                        <div class="form-group">
                            <label>İsim</label>
                            <input type="text" name="ad" class="form-control" placeholder="Adınızı Giriniz">
                        </div>
                        <div class="form-group">
                            <label>Soyisim</label>
                            <input type="text" name="soyad" class="form-control" placeholder="Soyadınızı Giriniz">
                        </div>
                        <div class="form-group">
                            <label>Meslek</label>
                            <input type="text" name="meslek" class="form-control" placeholder="Mesleğinizi Giriniz">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="mail" class="form-control" placeholder="Email Adresinizi Giriniz">
                        </div>
                        <div class="form-group">
                            <label>Telefon No</label>
                            <input type="text" name="telefon" class="form-control" placeholder="Telefon No Giriniz">
                        </div>
                        <div class="form-group">
                            <label>Cinsiyet</label>
                            <input type="text" name="cinsiyet" class="form-control" placeholder="Cinsiyetinizi Giriniz">
                        </div>

                        <div class="form-group">
                            <label>Doğum Tarihi</label>
                            <input type="text" name="dogum_tarihi" class="form-control" placeholder="Doğum Tarihinizi Giriniz">
                        </div>
                        <div class="form-group">
                            <label>Adres</label>
                            <input type="text" name="adres" class="form-control" placeholder="Adresinizi Giriniz">
                        </div>
                        <div class="form-group">
                            <label>Hakkınızda</label>
                            <input type="text" name="kisi_bilgi" class="form-control" placeholder="Hakkınızda Bilgi Giriniz">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a  href="addstuff.php" class="btn btn-danger"> BACK </a>
                        <button type="submit" name="insertdata" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
                      
                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
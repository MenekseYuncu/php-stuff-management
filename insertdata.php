<?php


$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'odev_1');


if (isset($_POST['add'])) {

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
     VALUES ($tc,$ad,$soyad,$meslek,$mail,$telefon,$cinsiyet,$dogum_tarihi,$adres,$kisi_bilgi)";
   // $squery_run = mysqli_query($connection, $query);
   
   if (mysqli_query($conn, $sql))
   {
       $success    =   "New record created successfully !";
   }
   else
   {
   echo "Error: " . $sql . " " . mysqli_error($conn);
   }
   mysqli_close($conn);

    
}
?>
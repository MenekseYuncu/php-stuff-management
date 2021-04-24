<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'odev_1');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
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

        $query = "UPDATE personeller SET tc='$tc', ad='$ad',soyad='$soyad', meslek='$meslek', mail='$mail',
         telefon='$telefon', cinsiyet='$cinsiyet', dogum_tarihi='$dogum_tarihi',
          adres='$adres', kisi_bilgi=' $kisi_bilgi' WHERE id='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:stufflist.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>

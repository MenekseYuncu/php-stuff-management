<?php
    include_once 'connect_db.php';
    $success  = "";
    if(isset($_POST['add']))
    {  
        $username  = $_POST['username'];
        $useremail = $_POST['useremail'];
        $address   = $_POST['address'];
        $phone     = $_POST['phone'];
        
        $sql = "INSERT INTO users (username,useremail,address, userphone)
        VALUES ('$username','$useremail','$address','$phone')";
        if (mysqli_query($conn, $sql))
        {
            $success    =   "New record created successfully !";
        }
        else
        {
        echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }else if($_POST['update']){

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

            $query = "UPDATE personeller SET tc='$tc', ad='$ad',soyad='$soyad', meslek='$meslek', mail='$mail', telefon='$telefon', cinsiyet='$cinsiyet', dogum_tarihi='$dogum_tarihi', adres='$adres', kisi_bilgi=' $kisi_bilgi' WHERE id='$id'  ";
            $query_run = mysqli_query($connection, $query);
            printf("Error: %s\n", mysqli_error($con));
            exit();

            if ($query_run)
            {
                echo '<script> alert("Data Updated"); </script>';
                // header("location:stufflist2.php");
                
            }
            else
            {
                echo '<script> alert("Data Not Updated"); </script>';
            }

        
    }
?>           
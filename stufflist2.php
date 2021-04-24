<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>PHP CRUD - Edit and Update Data</title>
</head>
<body>
    <?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'odev_1');

$id = '';
$id = (isset($_POST['id']) ? $_POST['id'] : '');

$query = "SELECT * FROM personeller";
$query_run = mysqli_query($connection, $query);

if ($query_run)
{
    while ($row = mysqli_fetch_array($query_run))
    {
?>
            <div class="container">
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <h2> PHP - CRUD : Update Data</h2>
                            <hr>
                            <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                
                        <div class="form-group">
                            <label>Tc No</label>
                            <input type="text" name="tc" class="form-control" value="<?php echo $row['tc'] ?>" placeholder="TC No Giriniz" required>
                        </div>
                        <div class="form-group">
                            <label>İsim</label>
                            <input type="text" name="ad" class="form-control" value="<?php echo $row['ad'] ?>" placeholder="Adınızı Giriniz" required>
                        </div>
                        <div class="form-group">
                            <label>Soyisim</label>
                            <input type="text" name="soyad" class="form-control" value="<?php echo $row['soyad'] ?>" placeholder="Soyadınızı Giriniz" required>
                        </div>
                        <div class="form-group">
                            <label>Meslek</label>
                            <input type="text" name="meslek" class="form-control" value="<?php echo $row['meslek'] ?>" placeholder="Mesleğinizi Giriniz" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="mail" class="form-control" value="<?php echo $row['mail'] ?>" placeholder="Email Adresinizi Giriniz" required>
                        </div>
                        <div class="form-group">
                            <label>Telefon No</label>
                            <input type="text" name="telefon" class="form-control" value="<?php echo $row['telefon'] ?>" placeholder="Telefon No Giriniz" required>
                        </div>
                        <div class="form-group">
                            <label>Cinsiyet</label>
                            <input type="text" name="cinsiyet" class="form-control" value="<?php echo $row['cinsiyet'] ?>" placeholder="Cinsiyetinizi Giriniz" required>
                        </div>
                        <div class="form-group">
                            <label>Doğum Tarihi</label>
                            <input type="text" name="dogum_tarihi" class="form-control" value="<?php echo $row['dogum_tarihi'] ?>" placeholder="Doğum Tarihinizi Giriniz" required>
                        </div>
                        <div class="form-group">
                            <label>Adres</label>
                            <input type="text" name="adres" class="form-control" value="<?php echo $row['adres'] ?>" placeholder="Adresinizi Giriniz" required>
                        </div>
                        <div class="form-group">
                            <label>Hakkınızda</label>
                            <input type="text" name="kisi_bilgi" class="form-control" value="<?php echo $row['kisi_bilgi'] ?>" placeholder="Hakkınızda Bilgi Giriniz" required>
                        </div>

                               
                                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>

                                <a href="index.php" class="btn btn-danger"> CANCEL </a>
                    </form>

                        </div>
                    </div>
                    
                    <?php
        if (isset($_POST['update']))
        {
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

                </div>
            </div>
            <?php
    }
}
else
{
    // echo '<script> alert("No Record Found"); </script>';
    
?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>No Record Found</h4>
                </div>
            </div>
        </div>
        <?php
}
?>
</body>
</html>

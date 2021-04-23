<!-- <?php 
 include 'config.php';
 
 $result = mysqli_query($pdo,"SELECT * FROM personeller");
?> -->

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

    <div class="card">
                <div class="card-body">

        <?php


        $connection = mysqli_connect("localhost", "root", "");
        $db = mysqli_select_db($connection, 'odev_1');

        $query = "SELECT * FROM personeller";
        $squery_run = mysqli_query($connection, $query);
        ?>    
    
                 <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">İD</th>
                            <th scope="col">TC No</th>
                            <th scope="col">İsim</th>
                            <th scope="col">Soyad</th>
                            <th scope="col">Meslek</th>
                            <th scope="col">Mail</th>
                            <th scope="col">Telefon</th>
                            <th scope="col">Cinsiyet</th>
                            <th scope="col">Doğum Tarihi</th>
                            <th scope="col">Adres</th>
                            <th scope="col">Hakkında</th>

                        </tr>
                     </thead>
        <?php   

            if ($squery_run)
            {
                foreach($squery_run as $row)
                {
        ?>       
                        <tbody>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['tc'];?></td>
                                <td><?php echo $row['ad'];?></td>
                                <td><?php echo $row['soyad'];?></td>
                                <td><?php echo $row['meslek'];?></td>
                                <td><?php echo $row['mail'];?></td>
                                <td><?php echo $row['telefon'];?></td>
                                <td><?php echo $row['cinsiyet'];?></td>
                                <td><?php echo $row['dogum_tarihi'];?></td>
                                <td><?php echo $row['adres'];?></td>
                                <td><?php echo $row['kisi_bilgi'];?></td>
                            </tr>
                            
                        </tbody>
        <?php            

                }
            }
            else
             {
                  echo "Kayıt Bulunamadı";
             }
        ?>                    
                    </table>


                </div>
            </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>



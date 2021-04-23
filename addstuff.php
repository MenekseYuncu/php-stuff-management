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



    <!-- Modal -->
    <div class="modal fade" id="addstuffmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Personel Bilgisi Girin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="insertdata.php" method="POST">
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kapat</button>
                        <button type="submit" name="#insertdata" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <h2> Personel Kayıt Formu</h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addstuffmodal">
                        Form Ekle
                    </button>
                </div>
            </div>

           
        </div>


    </div>






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Personel Listesi </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

    <style>
        body {
            
            font: 14px sans-serif;
        }
        .container {
            margin-left: 0px;
        }
        .card {
            width: 100%;
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
            </div>
            <div class="navbar-nav ml-auto">
                <a href="logout.php" class="btn btn-danger ml-3">Çıkış Yap</a>
            </div>
        </div>
    </nav>

    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Personel Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatedata.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label> tc </label>
                            <input type="text" name="tc" id="tc" class="form-control"
                                placeholder="Enter tc">
                        </div>

                        <div class="form-group">
                            <label> Ad </label>
                            <input type="text" name="ad" id="ad" class="form-control"
                                placeholder="Enter Ad">
                        </div>

                        <div class="form-group">
                            <label> soyad </label>
                            <input type="text" name="soyad" id="soyad" class="form-control"
                                placeholder="Enter soyad">
                        </div>

                        <div class="form-group">
                            <label> Meslek </label>
                            <input type="text" name="meslek" id="meslek" class="form-control"
                                placeholder="Enter Ad">
                        </div>

                        <div class="form-group">
                            <label> mail </label>
                            <input type="text" name="mail" id="mail" class="form-control"
                                placeholder="Enter mail">
                        </div>

                        <div class="form-group">
                            <label> Phone Number </label>
                            <input type="text" name="telefon" id="telefon" class="form-control"
                                placeholder="Enter Phone Number">
                        </div>

                        <div class="form-group">
                            <label> cinsiyet </label>
                            <input type="text" name="cinsiyet" id="cinsiyet" class="form-control"
                                placeholder="Enter cinsiyet">
                        </div>

                        <div class="form-group">
                            <label> dogum_tarihi </label>
                            <input type="text" name="dogum_tarihi" id="dogum_tarihi" class="form-control"
                                placeholder="Enter dogum_tarihi">
                        </div>                        <div class="form-group">
                            <label> adres </label>
                            <input type="text" name="adres" id="adres" class="form-control"
                                placeholder="Enter adres">
                        </div>

                        <div class="form-group">
                            <label> kisi_bilgi </label>
                            <input type="text" name="kisi_bilgi" id="kisi_bilgi" class="form-control"
                                placeholder="Enter kisi_bilgi">
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Personel Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletedata.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Do you want to Delete this Data ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>




    <div class="container" >

            <div class="card">
                <div class="card-body">

                    <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'odev_1');

                $query = "SELECT * FROM personeller";
                $query_run = mysqli_query($connection, $query);
            ?>
                    <table id="datatableid" class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col"> tc</th>
                                <th scope="col"> Ad </th>
                                <th scope="col"> soyad </th>
                                <th scope="col"> Meslek </th>
                                <th scope="col"> Mail </th>
                                <th scope="col"> Telefon No </th>
                                <th scope="col"> cinsiyet</th>
                                <th scope="col"> Dogum Tarihi </th>
                                <th scope="col"> Adres </th>
                                <th scope="col"> Hakkında </th>
                                <th scope="col"> EDIT </th>
                                <th scope="col"> DELETE </th>
                            </tr>
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
                                <td> <?php echo $row['tc']; ?> </td>
                                <td> <?php echo $row['ad']; ?> </td>
                                <td> <?php echo $row['soyad']; ?> </td>
                                <td> <?php echo $row['meslek']; ?> </td>
                                <td> <?php echo $row['mail']; ?> </td>
                                <td> <?php echo $row['telefon']; ?> </td>
                                <td> <?php echo $row['cinsiyet']; ?> </td>
                                <td> <?php echo $row['dogum_tarihi']; ?> </td>
                                <td> <?php echo $row['adres']; ?> </td>
                                <td> <?php echo $row['kisi_bilgi']; ?> </td>
                                <td>
                                    <button type="button" class="btn btn-success editbtn"> Duzenle </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger deletebtn"> Sil </button>
                                </td>
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



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
                $('#tc').val(data[1]);
                $('#ad').val(data[2]);
                $('#soyad').val(data[3]);
                $('#meslek').val(data[4]);
                $('#mail').val(data[5]);
                $('#telefon').val(data[6]);
                $('#cinsiyet').val(data[7]);
                $('#dogum_tarihi').val(data[8]);
                $('#adres').val(data[9]);
                $('#kisi_bilgi').val(data[10]);
            });
        });
    </script> 


</body>
</html>
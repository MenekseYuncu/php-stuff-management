<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

if(isset($_POST['Submit']))
{


    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection, 'odev_final');
    
    $username=$_SESSION["username"];
    $newpass = password_hash($_POST['npwd'], PASSWORD_DEFAULT);

    $query = "UPDATE users SET password='$newpass' WHERE username='$username' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run){
        $message = "password changed";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Change Password</title>
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


    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Change your Password</h1>
                   
             <form name="chngpwd" action="" method="post">
                    <table align="center">

                        <tr height="50">
                            <td>New Passoword :</td>
                            <td><input type="password" name="npwd" id="npwd"></td>
                        </tr>
                        <tr height="50">
                            <td>Confirm Password :</td>
                            <td><input type="password" name="cpwd" id="cpwd"></td>
                        </tr>
                        <tr>
                            <td><a href="logout.php">Back to login Page</a></td>
                            <td><input type="submit" name="Submit" value="Change Passowrd" /></td>
                        </tr>
                    </table>
			  </form>
            </div>
        </div>
      

    </div>
    <!-- /.container -->
    <script>
            function valid()
            {
                if(document.chngpwd.npwd.value=="")
                {
                    alert("New Password Filed is Empty !!");
                    document.chngpwd.npwd.focus();
                    return false;
                }
                else if(document.chngpwd.cpwd.value=="")
                {
                    alert("Confirm Password Filed is Empty !!");
                    document.chngpwd.cpwd.focus();
                    return false;
                }
                else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
                {
                    alert("Password and Confirm Password Field do not match  !!");
                    document.chngpwd.cpwd.focus();
                    return false;
                }
                return true;
            }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
</body>

</html>

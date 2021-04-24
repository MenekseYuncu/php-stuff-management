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
   

    $id = isset($_GET['id']) ? $_GET['id'] : '';
    
    

    $query = "SELECT * FROM student WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        while($row = mysqli_fetch_array($query_run))
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
                                    <label for=""> First Name </label>
                                    <input type="text" name="fname" class="form-control" value="<?php echo $row['fname'] ?>" placeholder="Enter First Name" required>
                                </div>
                                <div class="form-group">
                                    <label for=""> Last Name </label>
                                    <input type="text" name="lname" class="form-control" value="<?php echo $row['lname'] ?>" placeholder="Enter Last Name" required>
                                </div>
                                <div class="form-group">
                                    <label for=""> Contact </label>
                                    <input type="text" name="contact" class="form-control" value="<?php echo $row['contact'] ?>" placeholder="Enter Contact" required>
                                </div>

                                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>

                                <a href="index.php" class="btn btn-danger"> CANCEL </a>
                            </form>

                        </div>
                    </div>
                    
                    <?php
                    if(isset($_POST['update']))
                    {
                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $contact = $_POST['contact'];

                        $query = "UPDATE student SET fname='$fname', lname='$lname', contact=' $contact' WHERE id='$id'  ";
                        $query_run = mysqli_query($connection, $query);

                        if($query_run)
                        {
                            echo '<script> alert("Data Updated"); </script>';
                            header("location:index.php");
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
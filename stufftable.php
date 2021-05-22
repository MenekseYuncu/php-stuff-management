<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

function console_log( $data ){
    echo '<script>';
    echo 'console.log('. json_encode( $data ) .')';
    echo '</script>';
}


$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'odev_final');

$query = "SELECT * FROM personeller";
$query_run = mysqli_query($connection, $query);

if (isset($_POST['grup'])) {
    
    $query = "SELECT * FROM personeller Where personel_grup = '".$_POST['grup']."' ";
    $query_run = mysqli_query($connection, $query);
}

?>


<table id="datatableid" class="table table-bordered table-dark">
                    <thead>
                            <tr>
                                <th scope="col"> ID</th>                                
                                <th scope="col"> Tc No</th>
                                <th scope="col"> Ad </th>
                                <th scope="col"> Soyad </th>
                                <th scope="col"> Meslek </th>
                                <th scope="col"> Mail </th>
                                <th scope="col"> Telefon No </th>
                                <th scope="col"> cinsiyet</th>
                                <th scope="col"> Dogum Tarihi </th>
                                <th scope="col"> Adres </th>
                                <th scope="col"> Hakkında </th>
                                <th scope="col"> Personel Grubu</th>
                                <th scope="col"> Düzenle </th>
                                <th scope="col"> Sil </th>
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
                                        <td> <?php echo $row['personel_grup']; ?> </td>
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
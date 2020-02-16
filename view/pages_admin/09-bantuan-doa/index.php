<!-- NAVBAR -->
<?php require '../../global/admin/navbar_admin.php' ?>

<?php
    $con = mysqli_connect('localhost','root','','immanuel_app');

    if(!$con){
        echo "Hoe" ;
    }

    $query = " SELECT * FROM `sarankritik,bantuandoa,alasanketidakhadiran`" ;
    $execute = mysqli_query($con,$query) ;
    $saran_dan_kritik = mysqli_num_rows($execute) ;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/datatables.min.css" type="text/css">
</head>
<body>
    <div class="container">
    <table id="saran_dan_kritik" class="display">
        <thead>
            <tr>
                <th>Nama Anak</th>
                <th>Nama Orang Tua</th>
                <th>Kritik</th>
            </tr>
        </thead>
        <tbody>

        <?php
            if($saran_dan_kritik > 0){
                while($row = mysqli_fetch_array($execute)){
        ?>
            <tr>
                <td> <?php echo $row['nama_anak'] ?> </td>
                <td> <?php echo $row['nama_orang_tua'] ?> </td>
                <td> <?php echo $row['bantuan_doa'] ?> </td>
            </tr>

            <?php
                }
            }
        ?>
        </tbody>
    </table>
    </div> <!-- end container table-->

    <a href="../04-home-kelas/04-home-kelas.php">Back to home</a>

<script type="text/javascript" src=js/jquery.js></script>
<script type="text/javascript" src=js/datatables.min.js></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#saran_dan_kritik").DataTable();
    })
</script>
</body>
</html>
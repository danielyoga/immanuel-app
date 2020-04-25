<!-- GLOBAL HEAD -->
<?php require '../view/global/head-native.php' ?>

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://immanuelkids-app.com/api-v1/attendances/getAll.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$response = json_decode($response, true); //because of true, it's in an array
?>

<title>Immanuel Kids - Alasan Ketidakhadiran</title>
<link rel="stylesheet" href="../view/pages_admin/08-alasan-ketidakhadiran/css/datatables.min.css" type="text/css">
</head>
<body>
<a href="javascript:window.history.go(-1);">Back to home</a>

<br><br>
<h1 style="text-align:center;">Alasan Ketidakhadiran</h1>
<br><br>
    <div class="container">
    <table id="alasan_ketidakhadiran" class="display">
        <thead>
            <tr>
                <th>Nama Anak</th>
                <th>Nama Orang Tua</th>
                <th>Alasan Ketidakhadiran</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

<?php

if(isset($response['records'])){
    foreach ($response['records'] as $row) {
        echo '<tr>';
        echo '<td>' . $row['child_name'] . '</td>';
        echo '<td>' . $row['parent_title'] . ' ' . $row['parent_name'] . '</td>';
        echo '<td>' . $row['keterangan'] . '</td>';
    
        // Button read
        if($row['isRead'] != 1){
            echo '<td><input type="button" onclick="javascript:markAsRead(`'.$row['id'].'`);" value="Read"></td>';
        }
        else{
            echo '<td></td>';
        }
        echo '</tr>';
    }
}

?>

        </tbody>
    </table>
</div> <!-- end container table-->

<script type="text/javascript" src=../view/pages_admin/08-alasan-ketidakhadiran/js/jquery.js></script>
<script type="text/javascript" src=../view/pages_admin/08-alasan-ketidakhadiran/js/datatables.min.js></script>
<script type="text/javascript" src=../view/pages_admin/08-alasan-ketidakhadiran/ketidakhadiran.js></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#alasan_ketidakhadiran").DataTable();
    })
</script>
</body>
</html>
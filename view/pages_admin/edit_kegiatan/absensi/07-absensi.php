<!-- GLOBAL HEAD -->
<?php require '../view/global/head.php' ?>

<!-- get API with PHP -->
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/immanuel-app/api/attendances/getByActivity.php?id=" . $_GET['id'],
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

if(!isset($response['count']) ){
  header("Refresh: 0");
}
?>
<title>Immanuel Kids - Absensi</title>
</head>
<body>
<!-- NAVBAR -->
<?php require '../view/global/admin/navbar_detail_class.php' ?>

      <br>

      <h1 class="center">Absensi</h1>

      <br>

      <!-- table -->
    <form action="#">
      <table class="centered striped">
        <thead>
          <tr>
              <th>Nama Anak</th>
              <th>Kehadiran</th>
          </tr>
        </thead>
        <tbody>

        <?php

            if($response['count'] > 0){
                foreach ($response['records'] as $row) {
                    echo '<tr>';
                    echo '<td>'.$row['child_name'].'</td>';

                    // Button read
                    if($row['isAttend'] != 1){
                        echo '<td><a class="waves-effect waves-light btn" onclick="javascript:markAsAttend(`'.$row['id'].'`);" >Hadir</a></td>';
                    }
                    else{
                        echo '<td><p><label><input type="checkbox" checked="checked" disabled="disabled" /><span>Hadir</span></label></p></td>';
                    }
                    echo '</tr>';
                }
            }
            else{
              echo '<tr><td colspan="2">Tidak ada murid yang terdaftar</td></tr>';
            }
            
        ?>

        </tbody>
      </table>
    </form>

<script src="../view/pages_admin/edit_kegiatan/absensi/absensi.js"></script>
</body>
</html>
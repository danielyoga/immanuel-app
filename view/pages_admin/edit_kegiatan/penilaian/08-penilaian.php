<!-- GLOBAL HEAD -->
<?php require '../view/global/head.php' ?>

<!-- get API with PHP -->
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/immanuel-app/api/reports/getByActivity.php?id=" . $_GET['id'],
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

<title>Immanuel Kids - Penilaian</title>
</head>
<body>
    
<!-- NAVBAR -->
<?php require '../view/global/admin/navbar_detail_class.php' ?>

  <br>
  <h1 class="center">Penilaian</h1>
  <br><br>

  <div class="container center-align">
  
  <form action="#">
    <table class="responsive-table">
      <thead>
        <tr>
          <th>Name</th>
          <!-- parameter table header -->
          <?php
            if($response['count'] > 0){
                  $th_param = array();

                  foreach ($response['records'] as $row) {
                    array_push($th_param, $row['parameter']);
                  }

                  // classified the parameter
                  $th_param = array_unique($th_param);
                  $number_of_parameter = count($th_param); 
                  $number_of_column = $number_of_parameter  + 1 ; // +1 for th name

                  // preview
                  foreach ($th_param as $th) {
                    echo '<th>' . $th . '</th>';
                  }
            }
            else{
              // do nothing
              $number_of_column = 1;
            }
          ?>
        </tr>
      </thead>
      <tbody>

        <?php

          if($response['count'] > 0){
              $temp_name = "TEMP_NAME";
              $count     = 0;
              foreach ($response['records'] as $row) {

                  if($temp_name != $row['child_name']){
                      $temp_name = $row['child_name'];
                      $count = 0; // for reset count
                      $count++;

                      // start new row
                      echo '<tr>';
                      echo '<td style="font-weight:bold;">'.$row['child_name'].'</td>';
                      if($row['value'] != 1){
                        echo '<td><a class="waves-effect waves-light btn-small" onclick="javascript:score(`'.$row['id'].'`);" >'.$row['parameter'].'</a></td>';
                      }
                      else{
                          echo '<td><p><label><input type="checkbox" checked="checked" disabled="disabled" /><span>Scored</span></label></p></td>';
                      }
                  }
                  else if($count > $number_of_parameter){
                      // means end of row
                      echo '</tr>';
                  }
                  else{
                      // should be in a row
                      $count++;
                      if($row['value'] != 1){
                        echo '<td><a class="waves-effect waves-light btn-small" onclick="javascript:score(`'.$row['id'].'`);" >'.$row['parameter'].'</a></td>';
                      }
                      else{
                          echo '<td><p><label><input type="checkbox" checked="checked" disabled="disabled" /><span>Scored</span></label></p></td>';
                      }
                  }

              }
          }
          else{
            // no students
            echo '<tr><td colspan="'. $number_of_column .'">Tidak ada murid yang terdaftar</td></tr>';
          }

      ?>


      </tbody>
    </table>
    </form>

    </div> <!-- container div end-->

<script src="../view/pages_admin/edit_kegiatan/penilaian/penilaian.js"></script>    
</body>
</html>
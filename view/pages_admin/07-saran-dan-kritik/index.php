<!-- GLOBAL HEAD -->
<?php require '../view/global/head-native.php' ?>

<!-- get API with PHP -->
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://immanuelkids-app.com/api-v1/reviews/getAll.php",
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


<title>Immanuel Kids - Saran dan Kritik</title>
<link rel="stylesheet" href="../view/pages_admin/07-saran-dan-kritik/css/datatables.min.css" type="text/css">
</head>
<body>
<a href="javascript:window.history.go(-1);">Back to home</a>

<br><br>
<h1 style="text-align:center;">Kritik dan Saran</h1>
<br><br>
    <div class="container">
    <table id="saran_dan_kritik" class="display" style="text-align:center;">
        <thead>
            <tr>
                <th>Nama Orang Tua</th>
                <th>Kritik</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                
                if(isset($response['records'])){
                    foreach ($response['records'] as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['parent_title'] . ' ' . $row['parent_name'] . '</td>';
                    echo '<td>' . $row['review'] . '</td>';

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

<script type="text/javascript" src=../view/pages_admin/07-saran-dan-kritik/js/jquery.js></script>
<script type="text/javascript" src=../view/pages_admin/07-saran-dan-kritik/js/datatables.min.js></script>

<script type="text/javascript" src=../view/pages_admin/07-saran-dan-kritik/saran-dan-kritik.js></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#saran_dan_kritik").DataTable({
            "order": [[ 2, "desc" ]]
        });
    });
</script>
</body>
</html>
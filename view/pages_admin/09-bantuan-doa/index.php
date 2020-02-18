<!-- GLOBAL HEAD -->
<?php require '../view/global/head-native.php' ?>

<!-- get API with PHP -->
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/immanuel-app/api/pray/getAll.php",
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


<link rel="stylesheet" href="../view/pages_admin/09-bantuan-doa/css/datatables.min.css" type="text/css">
<title>Immanuel Kids- Bantuan Doa</title>
</head>
<body><a href="javascript:window.location=window.history.go(-1);;">Back to home</a>

<br><br>
<h1 style="text-align:center;">Bantuan Doa</h1>
<br><br>

    <div class="container">
    <table id="saran_dan_kritik" class="display">
        <thead>
            <tr>
                <th>Nama Orang Tua</th>
                <th>Bantuan Doa</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        
        <?php

            foreach ($response['records'] as $row) {
                echo '<tr>';
                echo '<td>' . $row['parent_title'] . ' ' . $row['parent_name'] . '</td>';
                echo '<td>' . $row['pray'] . '</td>';

                // Button read
                if($row['isRead'] != 1){
                    echo '<td><input type="button" onclick="javascript:markAsRead(`'.$row['id'].'`);" value="Read"></td>';
                }
                else{
                    echo '<td></td>';
                }
                echo '</tr>';
            }

        ?>

        </tbody>
    </table>
    </div> <!-- end container table-->

<script type="text/javascript" src=../view/pages_admin/09-bantuan-doa/js/jquery.js></script>
<script type="text/javascript" src=../view/pages_admin/09-bantuan-doa/js/datatables.min.js></script>
<script type="text/javascript" src=../view/pages_admin/09-bantuan-doa/bantuan-doa.js></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#saran_dan_kritik").DataTable({
            "order": [[ 2, "desc" ]]
        });
    })
</script>
</body>
</html>
<!-- get API with PHP -->
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/immanuel-app/api/teachers/getByClass.php?class_id=" .  $_GET['id'],
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

<!-- GLOBAL HEAD -->
<?php require '../view/global/head.php' ?>
<title>Immanuel Kids - Tambah Kegiatan</title>
</head>
<body>
<!-- NAVBAR -->
<?php require '../view/global/admin/navbar_detail_class.php' ?>

    <!-- logo immanuel kids -->
    <div class="container">
      <div class="row">
        <div class="col m2 l4"></div>
        <div class="col s12 m8 l4">
            <img class="responsive-img" src="../view/img/logo.png" alt="">
        </div>
        <div class="col m2 l6"></div>
      </div>
    

    <!-- register -->

    <h1 class="center-align flow-text" style="color: #001D39; font-weight: 700;">Tambah Kegiatan</h4>


    <form id="form_tambah_kegiatan" method="POST">
    
      <!-- Tanggal -->     
        <div class="row">
          <div class="col s3"></div>
          <div class="input-field col s6" id="username">
            <input id="date" name="date" type="text" class="datepicker">
            <label class="active" for="date">tanggal</label>
          </div>
          <div class="col s3"></div>
        </div>

      <!-- Class Id -->
      <div class="row" style="display:none;">
          <div class="col m3"></div>
          <div class="input-field col s12 m6" id="parent_id-group">
            <input id="class_id" name="class_id" type="text" class="validate" value="<?php echo $_GET['id'] ?>">
            <label class="active" for="class_id">Class ID</label>
          </div>
          <div class="col m3"></div>
      </div>
      

      <!-- Judul Kotbah -->
      
        <div class="row">
          <div class="col s3"></div>
          <div class="input-field col s6" id="username">
            <input id="title" name="title" type="text" class="validate" required>
            <label class="active" for="title">Judul Kotbah</label>
          </div>
          <div class="col s3"></div>
        </div>
      

      <!-- Ayat Pokok Kotbah -->
      
      <div class="row">
          <div class="col s3"></div>
          <div class="input-field col s6" id="username">
            <input id="reference" name="reference" type="text" class="validate" required>
            <label class="active" for="reference">Ayat Pokok Kotbah</label>
          </div>
          <div class="col s3"></div>
        </div>

      <!-- Rangkuman Kotbah -->
      <div class="row">
          <div class="col s3"></div>
          <div class="input-field col s6" id="username">
            <input id="summary" name="summary" type="text" class="validate" required>
            <label class="active" for="summary">Rangkuman Kotbah</label>
          </div>
          <div class="col s3"></div>
        </div>
        
      <!-- Guru yang menyampaikan Firman Tuhan -->
      <div class="row">
          <div class="col s3"></div>
          <div class="input-field col s6" id="username">
          <select name="presenter_id" required>
          <?php
              foreach ($response['records'] as $row) {
                  echo '<option value="'. $row['id'] .'">'. $row['name'] .'</option>';          
              }
          ?>
          </select>
          <label for="presenter_id">Yang menyampaikan khotbah</label>
          </div>
          <div class="col s3"></div>
        </div>


      <!-- register button -->
      <div class="container">
        <div class="row">
          <div class="col s3"></div>
          
          <!-- button -->
            <button class="btn col s6 light-blue darken-4" type="submit" name="action">Submit
              <i class="material-icons right">send</i>
            </button>

          <div class="col s3"></div>
        </div>
      </div>
      
      </form>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>
          
      <script src="../view/pages_admin/edit_kegiatan/form-tambah-kegiatan/form-tambah-kegiatan.js"></script>
 <script>
 (function($){
   $(function(){
     // Plugin initialization
     $('select').not('.disabled').formSelect();
     $('.datepicker').datepicker({format: 'yyyy-mm-dd'});
   }); 
 })(jQuery); // end of jQuery name space
 </script>
  </body>
</html>
      
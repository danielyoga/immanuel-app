<!DOCTYPE html>
<html>
  <head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>belajar materialize</title>

  </head>

  <body>

    <!-- logo immanuel kids -->
    <div class="container">
      <div class="row">
        <div class="col m2 l4"></div>
        <div class="col s12 m8 l4">
            <img class="responsive-img" src="../../../img/logo.png" alt="">
        </div>
        <div class="col m2 l6"></div>
      </div>
    

    <!-- register -->

      <h1 class="center-align flow-text" style="color: #001D39; font-weight: 700;">Tambah Kegiatan</h4>


    <form action="../04-landing-page/04-landing-page.html">
    
      <!-- Tanggal -->
      <!-- !!! comment : mau pakai date picker !!! -->
      
        <div class="row">
          <div class="col s3"></div>
          <div class="input-field col s6" id="username">
            <input id="register-date" type="text" class="validate" required>
            <label class="active" for="register-email">tanggal</label>
          </div>
          <div class="col s3"></div>
        </div>
      

      <!-- Judul Kotbah -->
      
        <div class="row">
          <div class="col s3"></div>
          <div class="input-field col s6" id="username">
            <input id="register-judul-kotbah" type="text" class="validate" required>
            <label class="active" for="register-username">Judul Kotbah</label>
          </div>
          <div class="col s3"></div>
        </div>
      

      <!-- Ayat Pokok Kotbah -->
      
      <div class="row">
          <div class="col s3"></div>
          <div class="input-field col s6" id="username">
            <input id="register-ayat-pokok-kotbah" type="text" class="validate" required>
            <label class="active" for="register-username">Ayat Pokok Kotbah</label>
          </div>
          <div class="col s3"></div>
        </div>

      <!-- Rangkuman Kotbah -->
      <div class="row">
          <div class="col s3"></div>
          <div class="input-field col s6" id="username">
            <input id="register-rangkuman-kotbah" type="text" class="validate" required>
            <label class="active" for="register-username">Rangkuman Kotbah</label>
          </div>
          <div class="col s3"></div>
        </div>
      
      <!-- Guru yang menyampaikan Firman Tuhan -->
      <div class="row">
          <div class="col s3"></div>
          <div class="input-field col s6" id="username">
            <input id="register-guru-yang-menyampaikan" type="text" class="validate" required>
            <label class="active" for="register-username">Yang menyampaikan Kotbah</label>
          </div>
          <div class="col s3"></div>
        </div>


      <!-- register button -->
      <div class="container">
        <div class="row">
          <div class="col s3"></div>
          
          <!-- button -->
            <button class="btn col s6 waves-effect waves-light light-blue darken-4" type="submit" name="action">Submit
              <i class="material-icons right">send</i>
            </button>

          <div class="col s3"></div>
        </div>
      </div>

    </form>

    <div class="container">
        <div class="row">
          <div class="col s3"></div>
          
          <!-- button -->
          <a href="../../04-home-kelas/04-home-kelas.php" class="btn col s6 waves-effect waves-light light-blue darken-1" type="submit" name="action">
          <i class="material-icons right"> cancel </i> cancel </a>

          <div class="col s3"></div>
        </div>
      </div>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>
          
 <script>
 (function($){
   $(function(){
     // Plugin initialization
     $('select').not('.disabled').formSelect();
   }); 
 })(jQuery); // end of jQuery name space
 </script>
  </body>
</html>
      
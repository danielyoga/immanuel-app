
    <!-- GLOBAL HEAD -->
    <?php require './view/global/head.php' ?>

    <link rel="stylesheet" href="./view/pages_admin/02-register-teacher/02-form-tambah-teacher.css">
    <title>Immanuel Kids - Teacher Register</title>

  </head>

  <body>

  <?php require './view/global/navbar-back.php' ?>

    <!-- logo immanuel kids -->
    <div class="container">
      <div class="row">
        <div class="col m2 l3"></div>
        <div class="col s12 m8 l6">
            <img class="responsive-img" src="./view/img/logo.png" alt="">
        </div>
        <div class="col m2 l6"></div>
      </div>
    

    <!-- register -->

    <h4 class="center-align flow-text" style="color: #001D39; font-weight: 700;">Tambah Guru</h4>

    <form id="form_register_children" method="POST" action="#">

      <!-- Profile Picture -->

      <div class="row">
          <div class="col m3"></div>
          <div class="col s12 m6 center">
              <img id="preview_photo" src="./Registrasi_files/register" width="70%">
              <br><br>
              <div class="file-field input-field">
              <div class="btn">
                <span>File</span>
                <input type="file" id="input_photo" accept="image/*" required>
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
          </div>
          <div class="col m3"></div>
      </div>

      <!-- Photo Input -->
        
      <div class="row" style="display:none">
          <div class="col m3"></div>
          <div class="input-field col s12 m6" id="photo-group">
            <input id="photo" name="photo" type="text" class="validate" value=" ">
            <label class="active" for="photo">Photo</label>
          </div>
          <div class="col m3"></div>
      </div>

      <script>
        function readFile() {
          if (this.files && this.files[0]) {
            var FR= new FileReader();
            FR.addEventListener("load", function(e) {
              document.getElementById("preview_photo").src  = e.target.result;
              document.getElementById("photo").value        = e.target.result;
            }); 
            FR.readAsDataURL( this.files[0] );
          }
        }
        document.getElementById("input_photo").addEventListener("change", readFile);
      </script>
    

      <!-- Nama lengkap -->

      <div class="row">
        <div class="col m3"></div>
        <div class="input-field col s12 m6" id="name-group">
          <input id="name" name="name" type="text" class="validate" required>
          <label class="active" for="name">Nama Lengkap</label>
        </div>
        <div class="col m3"></div>
      </div>
     

      <!-- Phone Number -->
        <div class="row">
          <div class="col m3"></div>
          <div class="input-field col s12 m6" id="phone_number-group">
            <input id="phone_number" name="phone_number" type="tel" class="validate" required>
            <label class="active" for="phone_number">Phone Number</label>
          </div>
          <div class="col m3"></div>
        </div>
     

      <!-- pilih kelas -->
      <div class="row">
        <div class="col m3"></div>
        <div class="input-field col s12 m6" id="select-class">
          <!-- pilihan kelas -->
        </div>
        <div class="col m3"></div>
      </div> <!-- end div row-->

      <!-- Password -->
        <div class="row">
          <div class="col m3"></div>
            <div class="input-field col s12 m6" id="password-group">
              <input id="password" name="password" type="password" class="validate" required>
              <label class="active" for="password">Password</label>
            </div>
          <div class="col m3"></div>
        </div>
      

      
      <!-- register button -->
      <div class="container">
        <div class="row">
          <div class="col m3"></div>
          
          <!-- button -->
            <button class="btn col s12 m6 waves-effect waves-light" type="submit" name="action">Submit
              <i class="material-icons right">send</i>
            </button>


          <div class="col m3"></div>
        </div>
      </div>


    </form>

    <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
          
    <script src="./view/pages_admin/02-register-teacher/form-teacher.js"></script>
    
    <script src="./view/script/cookies.js"></script>
  </body>
</html>
      
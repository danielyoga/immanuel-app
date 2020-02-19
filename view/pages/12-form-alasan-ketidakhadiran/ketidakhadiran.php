    <!-- GLOBAL HEAD -->
    <?php require './view/global/head.php' ?>
        
    <link rel="stylesheet" href="./view/pages/12-form-alasan-ketidakhadiran/ketidakhadiran.css">
    <title>Immanuel Kids - Form Ketidakhadiran</title>
  </head>

  <body>

  <!-- NAVBAR -->
  <?php require './view/global/navbar-back.php' ?>

    <!-- register -->
    <div class="container">
      <h2 class="center-align flow-text" style="color: #001D39; font-weight: 700;">Form Ketidakhadiran</h2>
      <br>
      <div class="row">
          <div class="col s12">
            <span class="center" id="keterangan" style="float:none;"></span>
          </div>
      </div>
    </div>

    <form id="form_register_parent" method="POST" action="#">



    <div class="container" style="display:none;">
        <div class="row">
          <div class="col m3"></div>
          <div class="input-field col s12 m6" id="name-group">
            <input id="id" name="id" type="text" class="validate" value=" ">
            <label class="active" for="id">Id</label>
          </div>
          <div class="col m3"></div>
        </div>
      </div>

      <!-- register -->
      <!-- Alasan -->
      <div class="container">
        <div class="row">
          <div class="col m3"></div>
          <div class="input-field col s12 m6" id="name-group">
            <input id="keterangan" name="keterangan" type="text" class="validate" required>
            <label class="active" for="keterangan">Alasan</label>
          </div>
          <div class="col m3"></div>
        </div>
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

      <!-- decline button -->
      <div class="container">
        <div class="row">
          <div class="col m3"></div>
          
          <!-- button -->
          <button class="btn red col s12 m6 waves-effect waves-light" id="btn_decline" name="action">
            tidak memberikan alasan
            <i class="material-icons right">close</i>
          </button>

          <div class="col m3"></div>
        </div>
      </div>


    </form>


    <!-- Compiled and minified JavaScript -->
    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./view/pages/12-form-alasan-ketidakhadiran/ketidakhadiran.js"></script>
  </body>
</html>
      
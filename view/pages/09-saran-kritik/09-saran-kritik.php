    <!-- GLOBAL HEAD -->
    <?php require './view/global/head.php' ?>

    <link rel="stylesheet" href="./view/pages/09-saran-kritik/09-saran-kritik.css">
    <title>Immanuel Kids - Saran dan Kritik</title>

  </head>

  <body>
    
    <!-- NAVBAR -->
    <?php require './view/global/navbar-home.php' ?>
          

    <div class="container">

        <h1>Saran dan Kritik</h1>
        <hr>

        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h6>
        
        <br><br>
      
      <!-- form input -->
      <form class="center" id="form_register_review" method="POST" action="">

        <!-- Parent Id -->
        <div class="row" style="display:none;">
            <div class="col m3"></div>
            <div class="input-field col s12 m6" id="parent_id-group">
              <input id="parent_id" name="parent_id" type="text" class="validate" value=" ">
              <label class="active" for="parent_id">Parent ID</label>
            </div>
            <div class="col m3"></div>
        </div>

        <!-- Saran dan kritik -->
        <div class="input-field col s12">
          <textarea id="review" name="review" class="materialize-textarea" required></textarea>
          <label for="review">Saran & Kritik</label>
        </div>

        <!-- button kirim -->
        <button class="btn col s12 m6 waves-effect waves-light" type="submit" name="action">
              Kirim <i class="material-icons right">send</i>
        </button> 
      </form>

    </div>
   

    <!-- Compiled and minified JavaScript -->
    <!-- JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="./view/pages/09-saran-kritik/saran-kritik.js"></script>
    <script src="./view/script/cookies.js"></script>
    
  </body>
</html>
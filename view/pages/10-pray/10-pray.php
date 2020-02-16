
    <!-- GLOBAL HEAD -->
    <?php require './view/global/head.php' ?>
    
    <link rel="stylesheet" href="./view/pages/10-pray/10-pray.css">
    <title>Immanuel Kids - Pray</title>

  </head>

  <body>
    
    <!-- NAVBAR -->
    <?php require './view/global/navbar-home.php' ?>
          

    <div class="container">


        <h1>Pray</h1>
        <hr>

        <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h6>
        
        <br><br>
      
      <form class="center" method="POST" id="form_register_pray">
        <!-- Parent Id -->
        <div class="row" style="display:none;">
            <div class="col m3"></div>
            <div class="input-field col s12 m6" id="parent_id-group">
              <input id="parent_id" name="parent_id" type="text" class="validate" value=" ">
              <label class="active" for="parent_id">Parent ID</label>
            </div>
            <div class="col m3"></div>
        </div>

        <!-- PRAYER -->
        <div class="input-field col s12">
          <textarea id="pray" name="pray" class="materialize-textarea" required></textarea>
          <label for="pray">Saran & Kritik</label>
        </div>

        
        <!-- button kirim -->
        <button class="btn col s12 m6 waves-effect waves-light" type="submit" name="action">
              Kirim <i class="material-icons right">send</i>
        </button> 
      </form>      
    </div>


    <div class="container center-align">
    <br><br>

      <!-- konseling button -->    
    <a target="__blank" href="https://api.whatsapp.com/send?phone=<nomor-pembina>" class="waves-effect waves-light btn">
      <i class="material-icons">message</i> Konseling via WA
    </a>
              
    </div>
   
    <div class="row">
      <div class="col s2 m3 l4"></div>
      
    </div>

    <!-- Compiled and minified JavaScript -->
    <!-- JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="./view/pages/10-pray/pray.js"></script>
    <script src="./view/script/cookies.js"></script>
    
  </body>
</html>
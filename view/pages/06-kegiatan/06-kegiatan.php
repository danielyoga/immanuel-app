    <!-- GLOBAL HEAD -->
    <?php require './view/global/head.php' ?>

    <link rel="stylesheet" href="./view/pages/06-kegiatan/06-kegiatan.css">
    <title>Immanuel Kids - Kegiatan</title>

  </head>

  <body>
    
    <!-- NAVBAR -->
    <?php require './view/global/navbar.php' ?>
          
    
    <div class="container">

      <h1 class="center">Kegiatan</h1>

      <br><br><br>

      <div class="row" id="activities-container">

        <!-- =============== -->
        <!-- CARD 1 -->
        <!-- =============== -->

        <div class="col s12 m6">
        <a href="../07-kegiatan-detail/07-kegiatan-detail.php">
          <div class="card">

            <!-- Card Date -->
            <div class="card-action black-text">
                <i class="material-icons">date_range</i>
                  Minggu, 01-02-2019
            </div>

            <div class="card-content black-text">

              <!-- Card Title -->
              <span class="card-title">
                  <img src="./view/icon-assets/bible-icon.png" style="width:8%;">
                  Kelahiran Tuhan Yesus 
              </span>
            
              <!-- Card Ayat -->
              <span class="card-action">
                <h5 class="left btn black white-text" style="border-radius:25px;">
                    Matius 1 : 18 - 25
                </h5>
                <br>
              </span>

            </div>

            <!-- Card Description -->
            <div class="card-action black-text">
              <p>
                I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.
              </p>
            </div>

          </div> <!-- end | card -->
        </a>
        </div> <!-- end | col -->


        <!-- =============== -->
        <!-- CARD 2 -->
        <!-- =============== -->

        <div class="col s12 m6">
        <a href="../07-kegiatan-detail/07-kegiatan-detail.php">
          <div class="card">

            <!-- Card Date -->
            <div class="card-action black-text">
                <i class="material-icons">date_range</i>
                  Minggu, 01-02-2019
            </div>

            <div class="card-content black-text">

              <!-- Card Title -->
              <span class="card-title">
                  <img src="./view/icon-assets/bible-icon.png" style="width:8%;">
                  Kelahiran Tuhan Yesus 
              </span>
            
              <!-- Card Ayat -->
              <span class="card-action">
                <h5 class="left btn black white-text" style="border-radius:25px;">
                    Matius 1 : 18 - 25
                </h5>
                <br>
              </span>

            </div>

            <!-- Card Description -->
            <div class="card-action black-text">
              <p>
                I am a very simple card. I am good at containing small bits of information.
                I am convenient because I require little markup to use effectively.
              </p>
            </div>

          </div> <!-- end | card -->
        </a>
        </div> <!-- end | col -->

      </div><!-- end | row -->
    </div> <!-- end | container -->



    <!-- Compiled and minified JavaScript -->
    <!-- JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./view/pages/06-kegiatan/kegiatan.js"></script>
    <script src="./view/script/cookies.js"></script>

    
  </body>
</html>
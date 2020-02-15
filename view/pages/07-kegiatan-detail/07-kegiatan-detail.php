
    <!-- GLOBAL HEAD -->
    <?php require './view/global/head.php' ?>

    <link rel="stylesheet" href="./view/pages/07-kegiatan-detail/07-kegiatan-detail.css">
    <title>Immanuel Kids - Detil Kegiatan</title>

  </head>

  <body>
    
    <!-- NAVBAR -->
    <?php require './view/global/navbar-back.php' ?>
          

    <!-- Kegiatan 1 -->
    <div class="container">

        <h2>Detil Kegiatan</h2>
        <hr>
        <br><br>

        <!-- tanggal kotbah -->
        <div class="row">
          <i class="material-icons medium col s2 m1">date_range</i>
          <div class="col s2 m1"></div>
          <p class="col s8 flow-text" id="date-container">Minggu, 12-12-2020</p>
        </div>

        <!-- judul kotbah -->
        <div class="row">
          <img src="./view/icon-assets/bible-icon.png" alt="" class="col 12">
          <div class="col s1"></div>
          <p class="left col s8 flow-text" id="title-container">Kelahiran Tuhan Yesus</p>
        </div>

        <h6 href="#" class="waves-effect waves-light btn black white-text" id="reference-container">Matius 1:18-25</h6>
        <p class="flow-text"  id="presenter-container">Oleh : Tante Hana</p>
        <p class="flow-text"  id="summary-container">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        
        <br>
        <hr style="width:70%;height:5px;background-color:black;">
        <br>

        <!-- foto media -->
        <h2 class="center">MEDIA</h2>
        <br><br>
        <div class="row center" id="media-container">
          <div class="col s12 m4">
            <img class="responsive-img" src="./view/img/dummy-activity.jpg">
          </div>
          <div class="col s12 m4">
            <img class="responsive-img" src="./view/img/dummy-activity.jpg">
          </div>
          <div class="col s12 m4">
            <img class="responsive-img" src="./view/img/dummy-activity.jpg">
          </div>
        </div>
      </div> <!-- end-->



    <!-- Compiled and minified JavaScript -->
    <!-- JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="./view/pages/07-kegiatan-detail/kegiatan-detail.js"></script>
    <script src="./view/script/cookies.js"></script>
    
  </body>
</html>
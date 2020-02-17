<!-- GLOBAL HEAD -->
<?php require '../view/global/head.php' ?>
<title>Immanuel Kids - Detail Kegiatan</title>
</head>
<body>

<!-- NAVBAR -->
<?php require '../view/global/admin/navbar_teacher.php' ?>
<?php require '../view/global/admin/topbar_detail_kegiatan.php' ?>

  <div class="container">

    <!-- tanggal kotbah -->
    <div class="row">
      <i class="material-icons medium col s1">date_range</i>
      <div class="col s1"></div>
      <p class="col 8 flow-text" id="date-container">Minggu, 12-012-2020</p>
    </div>

    <!-- judul kotbah -->
    <div class="row">
      <img src="../view/icon-assets/bible-icon.png" alt="" class="col s3 m2 l1">
      <div class="col s1"></div>
      <p class="left col 11 flow-text" id="title-container">Kelahiran Tuhan Yesus</p>
    </div>

    

    <h6 href="#" class="waves-effect waves-light btn black white-text" id="reference-container">Matius 1:18-25</h6>
    <p class="flow-text" id="presenter-container">Oleh : Tante Hana</p>
    <p class="flow-text" id="summary-container">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    
    <!-- foto media -->
    <h2 class="center">MEDIA</h2>
        <br><br>
        <div class="row center" id="media-container">
          <div class="col s12 m4">
            <img class="responsive-img" src="../view/img/dummy-activity.jpg">
          </div>
          <div class="col s12 m4">
            <img class="responsive-img" src="../view/img/dummy-activity.jpg">
          </div>
          <div class="col s12 m4">
            <img class="responsive-img" src="../view/img/dummy-activity.jpg">
          </div>
        </div>
      </div> <!-- end-->
      
  </div> <!-- end-->

  <script src="../view/pages_admin/05-detail-kegiatan/detail-kegiatan.js"></script>
  </body>
</html>
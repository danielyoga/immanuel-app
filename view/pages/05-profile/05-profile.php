    <!-- GLOBAL HEAD -->
    <?php require './view/global/head.php' ?>


    <link rel="stylesheet" href="./view/pages/05-profile/05-profile.css">
    <title>Immanuel Kids - Child Profile</title>
  </head>

  <body>
    
    <!-- NAVBAR -->
    <?php require './view/global/navbar.php' ?>
          
    <br>
        
<div class="container">
  <div class="row">

        <!-- photo profile anak -->
        <div class="row">
          <div class="col m4"></div>
          <div class="col s12 m4 center">
            <!-- nama anak -->
            <h3 id="nama_anak">
                <!-- child name here -->
            </h3>

            <!-- img -->
            <span id="img_anak">
                <!-- img anak here -->
            </span>
            
          
            <!-- nama kelas -->
            <h4 id="nama_kelas" >
              <!-- nama kelas here -->
            </h4>
          </div>

          <div class="col m4"></div>
        </div>



    <hr style="width:70%;height:5px;background-color:black;">
    
    <div class="row">
      <div class="col s12 center">
        <h2>Teacher List</h2>
      </div>
    </div>
    

  <div class="row center" id="teacher-list-container" style="padding:5%;">
        <!-- teacher card here -->
  </div>

</div> <!-- container div end -->


    <!-- Compiled and minified JavaScript -->
    <!-- JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="./view/script/cookies.js" ></script>
    <script src="./view/pages/05-profile/profile.js"></script>

  </body>
</html>
    <!-- GLOBAL HEAD -->
    <?php require './view/global/head.php' ?>


    <link rel="stylesheet" href="./view/pages/05-profile/05-profile.css">
    <title>Immanuel Kids - Child Profile</title>
  </head>

  <body>
    
    <!-- NAVBAR -->
    <?php require './view/global/navbar.php' ?>
          
    <br>

    <div class="container center">

<<<<<<< HEAD
      <!-- nama anak -->
    <h3 class="center-align" id="nama_anak">Andi</h3>

    <br>

    <div class="container center-align">
    <!-- photo profile anak -->
    <div class="row">
      <div class="col s3 m4 l5"></div>
      <div class="col s6 m4 l2">
      <!-- img -->
        <img style="border: 1px solid black;" src="../../img/profile_img.png" alt="" class="circle responsive-img"/>
      </div>
      <div class="col s3 m4 l5"></div>
    </div>
    <br>
      <!-- nama kelas -->
      <!-- comment: biasakan buat menggunakan css untuk letter spacingnya -->
    <span id="nama_kelas"> <h4 style="font-weight: bold;">"Dekapolis"</h4> </span>


    </div>

        
<div class="container">
  <div class="row">
=======
>>>>>>> api-branch

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
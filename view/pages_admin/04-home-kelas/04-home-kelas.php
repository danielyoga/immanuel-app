<!DOCTYPE html>
<html>
  <head>
    <!-- Specify the character encoding for the HTML document -->
    <meta charset="UTF-8">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled minified Jquery -->
    <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>belajar materialize</title>

    <link rel="stylesheet" href="05-profile.css">

  </head>

  <body>
    
  <!-- NAVBAR -->
  <?php require '../../global/admin/navbar_admin_pembina.php' ?>
  <?php require '../../global/admin/topbar_admin_pembina.php' ?>

<div class="container">

  <!-- card kegiatan -->
  <!-- =============== -->
        <!-- CARD 1 -->
        <!-- =============== -->

        <div class="col s12 m6">
        
          <div class="card">

            <!-- Card Date -->
            <div class="card-action black-text">
                <i class="material-icons">date_range</i>
                  Minggu, 01-02-2019
            </div>

            <div class="card-content black-text">

              <!-- Card Title -->
              <span class="card-title">
                  <img src="../../icon-assets/bible-icon.png" style="width:8%;">
                  Kelahiran Tuhan Yesus 
              </span>

      <!-- !!! ukuran img dibuat lebih kecil !!! -->
            
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
              <a href="../05-detail-kegiatan/05-detail-kegiatan.php" class="waves-effect waves-light btn">Detail</a>
            </div>
            

          </div> <!-- end | card -->
        
        </div> <!-- end | col -->

  </div> <!-- div end container -->
  
  <!-- float button + -->
  <!-- tambah kegiatan -->
  <div class="fixed-action-btn">
      <a class="btn-floating btn-large" href="">
        <i class="large material-icons light-blue darken-4">add</i>
      </a>
    </div>
  

  </body>
</html>
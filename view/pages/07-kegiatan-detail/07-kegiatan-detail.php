<!DOCTYPE html>
<html>
  <head>
    <!-- Specify the character encoding for the HTML document -->
    <meta charset="UTF-8">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="07-kegiatan-detail.css">

    <!-- Compiled minified Jquery -->
    <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>belajar materialize</title>

  </head>

  <body>
    
    <!-- NAVBAR -->
    <?php require '../../global/navbar.php' ?>
          

    <!-- Kegiatan 1 -->
    <div class="container">

        <h2>Detil Kegiatan</h2>
        <hr>
        <br><br>

        <!-- tanggal kotbah -->
        <div class="row">
          <i class="material-icons medium col s1">date_range</i>
          <div class="col s1"></div>
          <p class="col 8 flow-text">Minggu, 12-012-2020</p>
        </div>

        <!-- judul kotbah -->
        <div class="row">
          <img src="../../icon-assets/bible-icon.png" alt="" class="col s3 m2 l1">
          <div class="col s1"></div>
          <p class="left col 11 flow-text">Kelahiran Tuhan Yesus</p>
        </div>

        <h6 href="#" class="waves-effect waves-light btn black white-text">Matius 1:18-25</h6>
        <p class="flow-text">Oleh : Tante Hana</p>
        <p class="flow-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        
        <br>
        <hr style="width:70%;height:5px;background-color:black;">
        <br>

        <!-- foto media -->
        <div class="row center">
          <h2>MEDIA</h2>
          <br><br>
          <div class="col s12 m4">
            <img class="responsive-img materialboxed" src="../../img/dummy-activity.jpg">
          </div>
          <div class="col s12 m4">
            <img class="responsive-img materialboxed" src="../../img/dummy-activity.jpg">
          </div>
          <div class="col s12 m4">
            <img class="responsive-img materialboxed" src="../../img/dummy-activity.jpg">
          </div>
        </div>
      </div> <!-- end-->



    <!-- Compiled and minified JavaScript -->
    <!-- JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="../../script/cookies.js"></script>

    <script>
      $(document).ready(function(){
        $('.sidenav').sidenav({
          edge: 'right', // Choose the horizontal origin
          closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
        });
        $('.dropdown-trigger').dropdown();
        $('.materialboxed').materialbox();

        // store jwt to cookie
        setCookie("jwt", "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9leGFtcGxlLm9yZyIsImF1ZCI6Imh0dHA6XC9cL2V4YW1wbGUuY29tIiwiaWF0IjoxMzU2OTk5NTI0LCJuYmYiOjEzNTcwMDAwMDAsImRhdGEiOnsiaWQiOiIxIiwibGFzdG5hbWUiOiJwYXJlbnQxIiwiZW1haWwiOiJwYXJlbnQxQGVtYWlsLmNvbSJ9fQ.PeGa_mKzIwZRPIPkRy9jCtPtNJfeFob__1dkd2CPDaA", 1);
      });

      // cara 2 hapus cookie
      $('#logout').click(function(){
        unSetCookie("jwt");
      });

    </script>

    
  </body>
</html>
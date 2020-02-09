<!DOCTYPE html>
<html>
  <head>
    <!-- Specify the character encoding for the HTML document -->
    <meta charset="UTF-8">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="06-kegiatan.css">

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
          
    
    <div class="container">
      <div class="row">

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
                  <img src="../../icon-assets/bible-icon.png" style="width:8%;">
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
                  <img src="../../icon-assets/bible-icon.png" style="width:8%;">
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

    <script src="../../script/cookies.js"></script>

    <script>
      $(document).ready(function(){
        // letakkan initialize object di dalam document ready
        // jika tidak maka javascript tidak akan menginitialize object tersebut,
        // ketika document/halaman sudah siap
        $('.sidenav').sidenav({
          edge: 'right', // Choose the horizontal origin
          closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
        });
        $('.dropdown-trigger').dropdown();

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
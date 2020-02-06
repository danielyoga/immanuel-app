<!DOCTYPE html>
<html>
  <head>
    <!-- Specify the character encoding for the HTML document -->
    <meta charset="UTF-8">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="05-profile.css">

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
          
    <br>

      <!-- nama anak -->
    <h3 class="center-align" id="nama_anak">Andi</h3>

    <br>

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
    <h4 class="center-align" id="nama_kelas">" D e k a p o l i s "</h3>

    

        <!-- card guru -->
        <div class="container">
          <div class="row">

            <div class="col s6 m3 ">
              <div class="card">
                <div class="card-content black-text">
                  <img src="../../img/profile_img.png" alt="" class="circle responsive-img"/>
                  <span class="card-title center-align">Nike</span>
                </div>
                <div class="card-action">
                  <a class="btn" href="#">Whatsapp</a>
                </div>
              </div>
            </div>
            <div class="col s6 m3 ">
              <div class="card">
                <div class="card-content black-text">
                  <img src="../../img/profile_img.png" alt="" class="circle responsive-img"/>
                  <span class="card-title center-align">Nike</span>
                </div>
                <div class="card-action">
                  <a class="btn" href="#">Whatsapp</a>
                </div>
              </div>
            </div>
            <div class="col s6 m3 ">
              <div class="card">
                <div class="card-content black-text">
                  <img src="../../img/profile_img.png" alt="" class="circle responsive-img"/>
                  <span class="card-title center-align">Nike</span>
                </div>
                <div class="card-action">
                  <a class="btn" href="#">Whatsapp</a>
                </div>
              </div>
            </div>
            <div class="col s6 m3">
              <div class="card">
                <div class="card-content black-text">
                  <img src="../../img/profile_img.png" alt="" class="circle responsive-img"/>
                  <span class="card-title center-align">Nike</span>
                </div>
                <div class="card-action">
                  <a class="btn" href="#">Whatsapp</a>
                </div>
              </div>
            </div>
            
          </div>
        </div>

    <!-- add photo button -->
    <div class="fixed-action-btn">
      <a class="btn-floating btn-large">
        <i class="large material-icons light-blue darken-4">add_a_photo</i>
      </a>
    </div>

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
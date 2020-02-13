<!DOCTYPE html>
<html>
  <head>
    <!-- Specify the character encoding for the HTML document -->
    <meta charset="UTF-8">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="08-berita.css">

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
      <div class="row center">

        <h1>Berita</h1>
        <hr>

        <br><br>

        <span id="event-container">

            <div class="col s12 m4">
              <img src="../../img/event.png" class="responsive-img materialboxed"/>
            </div>

            <div class="col s12 m4">
              <img src="../../img/event.png" class="responsive-img materialboxed"/>
            </div>

            <div class="col s12 m4">
              <img src="../../img/event.png" class="responsive-img materialboxed"/>
            </div>

        </span>

      </div>
    </div>
   

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
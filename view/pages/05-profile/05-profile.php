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


    <div class="container">


        <!-- photo profile anak -->
        <div class="row">
          <div class="col m4"></div>
          <div class="col s12 m4 center">
            <!-- nama anak -->
            <h3 class="" id="nama_anak">Andi</h3>

            <!-- img -->
            <img style="border: 1px solid black;" src="../../img/profile_img.png" alt="" class="circle responsive-img"/>
          
            <!-- nama kelas -->
            <h4 id="nama_kelas" >"Dekapolis"</h4>
          </div>
          <div class="col m4"></div>
        </div>



    <hr style="width:70%;height:5px;background-color:black;">
    

    <!-- nama kelas -->
    <div class="row">
      <div class="col s12 center">
        <h2>Teacher List</h2>
      </div>
    </div>
    

  <div class="row">

    <div class="card col m1"></div>

    <!-- card 1 -->
    <div class="card col s12 m4 center">

        <!-- profile picture guru -->
        <div class="card-img">
        <img src="../../img/user.png" alt="" class="circle responsive-img" style="border:2px solid black;"/>
          <span class="card-title">Yoga</span>
        </div>

        <!-- name -->
        <div class="card-content">
          <div class="card-action">
            <span class="btn"> <i class="material-icons">message</i> </span>
          </div>
        </div>
        

    </div> <!-- div card -->

    <div class="card col m2"></div>

    <!-- card 2 -->
    <div class="card col s12 m4 center">

        <!-- profile picture guru -->
        <div class="card-img">
        <img src="../../img/user.png" alt="" class="circle responsive-img" style="border:2px solid black;"/>
          <span class="card-title">Yoga</span>
        </div>

        <!-- name -->
        <div class="card-content">
          <div class="card-action">
            <span class="btn"> <i class="material-icons">message</i> </span>
          </div>
        </div>

    </div> <!-- div card -->

    <div class="card col m1"></div>

  
  </div> <!-- row div end -->

</div> <!-- container div end -->





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
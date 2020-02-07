<!DOCTYPE html>
<html>
  <head>
    <!-- Specify the character encoding for the HTML document -->
    <meta charset="UTF-8">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link rel="stylesheet" href="04-home.css">

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
    <nav>
      <div class="nav-wrapper"">
        <a href="#" class="white-text">LOGO</a>
      </div>
    </nav>
          
    

    <div class="container">

        <a href="../05-profile/05-profile.php">
        <!-- card 1 -->
        <div class="row">
            <div class="col m3"></div>
            <div class="col s12 m6">
            <!-- card -->
            <div class="card">

                <div class="row">

                    <div class="col s3">

                        <div class="card-image">
                        <img src="../../img/logo.png">
                        </div>

                    </div>

                    <div class="col s7">

                        <div class="card-content">
                        <h6 class="black-text flow-text">Anak 1</h6>
                        <h6 class="black-text flow-text">"dekapolis</h6>
                        </div>

                    </div>

                </div>

            </div>  
            </a> 

            </div>
            <div class="col m3"></div>
        </div>

        <!-- card 2 -->
        <div class="row">
            <div class="col m3"></div>
            <div class="col s12 m6">
            <!-- card -->
            <div class="card">

                <div class="row">

                    <div class="col s3">

                        <div class="card-image">
                        <img src="../../img/logo.png">
                        </div>

                    </div>

                    <div class="col s7">

                        <div class="card-content">
                        <h6 class="black-text flow-text">Anak 1</h6>
                        <h6 class="black-text flow-text">"dekapolis</h6>
                        </div>

                    </div>

                </div>

            </div>   

            </div>
            <div class="col m3"></div>
        </div>

    </div>

    <!-- plus button -->
    <div class="fixed-action-btn">
      <a class="btn-floating btn-large">
        <i class="large material-icons light-blue darken-4">add</i>
      </a>
    </div>

    <!-- Compiled and minified JavaScript -->
    <!-- JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
      $(document).ready(function(){
        $('.sidenav').sidenav();
      });
    </script>
  </body>
</html>
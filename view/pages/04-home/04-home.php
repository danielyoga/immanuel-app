    <!-- GLOBAL HEAD -->
    <?php require './view/global/head.php' ?>

    <link rel="stylesheet" href="./view/pages/04-home/04-home.css">
    <title>Immanuel Kids - Home</title>
  </head>

  <body>
          
  <?php require './view/global/navbar-home.php' ?>

    <h2 class="center">My Children</h2>

    <div class="container" id="children-container"> 
      <!-- Children Cards -->
    </div>

    <!-- plus button -->
    <div class="fixed-action-btn">
      <a class="btn-floating btn-large" href="register-child.php">
        <i class="large material-icons light-blue darken-4">add</i>
      </a>
    </div>

    <!-- Compiled and minified JavaScript -->
    <!-- JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./view/pages/04-home/home.js"></script>
    
    <script src="./view/script/cookies.js"></script>
  </body>
</html>
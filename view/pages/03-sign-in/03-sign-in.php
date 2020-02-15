    <!-- GLOBAL HEAD -->
    <?php require './view/global/head.php' ?>

    <link rel="stylesheet" href="./view/pages/03-sign-in/3-sign-in.css">
    <title>Immanuel Kids - Sign In</title>
  </head>

  <body>

    <!-- logo immanuel kids -->
    <div class="container">
      <div class="row">
        <div class="col m2 l3"></div>
        <div class="col s12 m8 l6">
            <img class="responsive-img" src="./view/img/logo.png" alt="">
        </div>
        <div class="col m2 l6"></div>
      </div>
    </div>

    <!-- sign in -->
    <div class="container">
      <h1 class="center-align flow-text" style="color: #001D39; font-weight: 700;">Sign in</h4>
    </div>


  <form id="form_login" method="POST">
    <!-- Username -->
    <div class="container">
      <div class="row">
        <div class="col m3"></div>
        <div class="input-field col s12 m6" id="phone_number-group">
          <input name="phone_number" id="phone_number" type="tel" class="validate" required>
          <label class="active" for="phone_number">Phone Number</label>
        </div>
        <div class="col m3"></div>
      </div>
    </div>


    <!-- Password -->
    <div class="container">
      <div class="row">
        <div class="col m3"></div>
          <div class="input-field col s12 m6" id="password-group">
            <input name="password" id="password" type="password" class="validate" required>
            <label class="active" for="password">Password</label>
          </div>
        <div class="col m3"></div>
      </div>
    </div>
    
    <!-- sign in button -->
    <div class="container">
      <div class="row">
        <div class="col m3"></div>
        
        <!-- button -->
        <a>
          <button class="btn col s12 m6 waves-effect waves-light" type="submit" name="action">Sign In
            <i class="material-icons right">send</i>
          </button>
        </a>

        <div class="col m3"></div>
      </div>
    </div>  
  
</form>



    <!-- Compiled and minified JavaScript -->
    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./view/pages/03-sign-in/sign-in.js"></script>
    <script src="./view/script/cookies.js"></script>
  </body>
</html>
      
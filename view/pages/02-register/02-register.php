    <!-- GLOBAL HEAD -->
    <?php require './view/global/head.php' ?>
        
    <link rel="stylesheet" href="./view/pages/02-register/02-register.css">
    <title>Immanuel Kids - Register</title>
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

    <!-- register -->
    <div class="container">
      <h1 class="center-align flow-text" style="color: #001D39; font-weight: 700;">Register</h4>
    </div>

    <form id="form_register_parent" method="POST" action="#">
    
      <!-- register  -->
      <!-- Phone Number -->
      <div class="container">
        <div class="row">
          <div class="col m3"></div>
          <div class="input-field col s12 m6" id="phone_number-group">
            <input id="phone_number" name="phone_number" type="tel" class="validate" required>
            <label class="active" for="phone_number">Phone Number</label>
          </div>
          <div class="col m3"></div>
        </div>
      </div>

      <!-- register -->
      <!-- Name -->
      <div class="container">
        <div class="row">
          <div class="col m3"></div>
          <div class="input-field col s12 m6" id="title-group">
            <label class="active" for="title">Title</label>

            <p>
              <label>
                <input class="with-gap" name="title" type="radio" value="Mr."required/>
                <span>Mr.</span>
              </label>
            </p>

            <p>
              <label>
                <input class="with-gap" name="title" type="radio" value="Mrs."required/>
                <span>Mrs.</span>
              </label>
            </p>
          </div>
          <div class="col m3"></div>
        </div>
      </div>

      <!-- register -->
      <!-- Name -->
      <div class="container">
        <div class="row">
          <div class="col m3"></div>
          <div class="input-field col s12 m6" id="name-group">
            <input id="name" name="name" type="text" class="validate" required>
            <label class="active" for="name">Name</label>
          </div>
          <div class="col m3"></div>
        </div>
      </div>

      <!-- register -->
      <!-- Password -->
      <div class="container">
        <div class="row">
          <div class="col m3"></div>
            <div class="input-field col s12 m6" id="password-group">
              <input id="password" name="password" type="password" class="validate" required>
              <label class="active" for="password">Password</label>
            </div>
          <div class="col m3"></div>
        </div>
      </div>

      
      <!-- register button -->
      <div class="container">
        <div class="row">
          <div class="col m3"></div>
          
          <!-- button -->
          <button class="btn col s12 m6 waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
          </button>

          <div class="col m3"></div>
        </div>
      </div>


    </form>


    <!-- Compiled and minified JavaScript -->
    <!--JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./view/pages/02-register/register-parent.js"></script>
  </body>
</html>
      
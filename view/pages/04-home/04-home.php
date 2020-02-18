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

        <!-- Modal Trigger -->
        <a class="btn modal-trigger" href="#modal1" data-target="terms">Modal Default</a>
    
    <!-- Modal Structure -->
    <div class="modal"  id="terms">

        <!-- content -->
      <div class="modal-content">
        <h4>Anak</h4>
        <p>Andi Subarjo</p>
        <span>Tidak hadir pada : Minggu, 12 - 02 - 2020</span>

        <form action="">
          <div class="input-field col s12 l6">
            <input type="text" id="alasan_ketidakhadiran" class="ketidakhadiran">
            <label for="alasan_ketidakhadiran">alasan ketidakhadiran</label>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Submit</a>
      </div>
    </div>

    
    <!-- Compiled and minified JavaScript -->
    <!-- JavaScript at end of body for optimized loading-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./view/pages/04-home/home.js"></script>
    
    <script src="./view/script/cookies.js"></script>

    
<!-- pop up ketidak hadiran -->

<script>
    $(document).ready(function(){
       $('#terms').modal();
       $('#terms').modal('open'); 
    });
</script>

<script>
      document.addEventListener('DOMContentLoaded', function() {
    const box = document.querySelector('.modal');
    M.Modal.init(box, {});
  });
</script>

<script>
      $(document).ready(function(){
    $('.modal').modal();
  });
</script>



  </body>
</html>
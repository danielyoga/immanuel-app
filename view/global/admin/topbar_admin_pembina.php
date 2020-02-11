<!-- header -->

<div class="container-fluid center-align" style="background-color: #001D39;">
      <!-- img = logo immanuel kids -->
      <!-- <img src="../../img/logo.png" alt=""/> -->
      <!-- comment : ukuran font dekapolis dibuat lebih besar -->
      <span class="white-text">Dekapolis</span>
      <br>
      <a href="../06-daftar-anak/06-daftar-anak.php" class="waves-effect waves-light btn black white-text">Daftar Anak</a>
      <br><br>

      <!-- dropdown form kelas -->
      <form action="../04-landing-page/04-landing-page.html">
        <!-- pilih kelas -->
        <!-- comment : text nya dibuat warna putih -->
        <div class="row">
          <div class="col s3"></div>
          <div class="input-field col s6">
            
            <!-- pilihan kelas -->
            <select>
              <option value="yes">kelas 1</option>
              <option value="no">kelas 2</option>
              <option value="dont">I Don't Know</option>
            </select>
            <!-- placeholder -->
            <label>Pilih kelas</label>
          </div>
          <div class="col s3"></div>
        </div> <!--end div row-->
      </form>

  </div>


    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>
          
 <script>
 (function($){
   $(function(){
     // Plugin initialization
     $('select').not('.disabled').formSelect();
   }); 
 })(jQuery); // end of jQuery name space
 </script>

 
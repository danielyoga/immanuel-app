<!-- header -->

<div class="container-fluid center-align" style="background-color: #001D39;">
      <!-- img = logo immanuel kids -->
      <!-- <img src="../../img/logo.png" alt=""/> -->
      <!-- comment : ukuran font dekapolis dibuat lebih besar -->
      <span class="white-text" style="font-size: 5em;" id="class_name-container"></span>
      <br>
      <br>
      <span id="button_daftar_anak-container"></span>
      <br><br>

      <!-- dropdown form kelas -->
      <form action="../04-landing-page/04-landing-page.html">
        <!-- pilih kelas -->
        <!-- comment : text nya dibuat warna putih -->
        <div class="row">
          <div class="col s3"></div>
          <div class="input-field col s6"  style="background-color:white;border-radius:30px;">
            <!-- pilihan kelas -->
            <select id="select_month" onchange="javascript:showActivityOnMonth(this.value)">
              <?php
                $month_now = date('m');
                $month_now = str_replace( "0", "", date('m') );

                $months = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                for ($x = 1; $x < count($months); $x++) {
                  if($x == $month_now ){
                    echo '<option value="'.$x.'" selected>'.$months[$x].'</option>';
                  }
                  else{
                    echo '<option value="'.$x.'">'.$months[$x].'</option>';
                  }
                } 
              ?>
            </select>
          </div>
          <div class="col s3"></div>
        </div> <!--end div row-->
      </form>
                <br>
  </div>
<br>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>
     <script>
      $(document).ready(function() {
        $('select').not('.disabled').formSelect();
        
        var url_string = window.location;
        var url = new URL(url_string);
        var class_id = url.searchParams.get("id");

        $('#button_daftar_anak-container').html('<a href="daftar-anak.php?id='+class_id+'" class="waves-effect waves-light btn black white-text">Daftar Anak</a>');

        if(class_id == 0){
          var url= "../login.php"; 
          window.location = url; 
        }

        $.ajax({
            url:  "http://localhost/immanuel-app/api/class/getall.php",
            contentType: "application/json",
            dataType: 'json',
            success: function(result){
                var name_class;

                var kelas = result.records;
                kelas.forEach(item => {
                    if(item.id == class_id){
                        name_class = item.name;
                        
                        setCookie("immanuel_admin_class", name_class, 1);
                        setCookie("immanuel_admin_class_id", item.id, 1);
                    } 
                });

                $("#class_name-container").html(name_class);
            },
            error: function(xhr, resp, text){
              var url= window.history.go(-1);; 
              window.location = url; 
            }
        });
    });
      </script>
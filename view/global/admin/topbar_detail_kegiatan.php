<!-- header -->

<div class="container-fluid center-align" style="background-color: #001D39;">
      <!-- img = logo immanuel kids -->
      <!-- <img src="../../img/logo.png" alt=""/> -->
      <!-- comment : ukuran font dekapolis dibuat lebih besar -->
      <span class="white-text" style="font-size: 5em;" id="class-container">Dekapolis</span>
      <br>
      
  </div>

  <!-- buttons edit kegiatan-->
  <div class="container-fluid center-align" style="background-color: #001D39;">
  <br><br>
    <div class="row">
      <div class="col s4" id="button_absensi-container">
        <!-- btn_absensi -->
      </div>
      <div class="col s4" id="button_penilaian-container">
        <!-- btn_penilaian -->
      </div>
      <div class="col s4" id="button_upload-container">
        <!-- btn_upload -->
      </div>
    </div>
  <br>
  </div>
  <br>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>
<script>
$(document).ready(function(){
  $('#class-container').html(getCookie('immanuel_admin_class'));
  $('#button_absensi-container').html(`<a href="absensi.php?id=`+getCookie('immanuel_admin_activity')+`" class="waves-effect waves-light btn indigo darken-4">Absensi</a>`);
  $('#button_penilaian-container').html(`<a href="penilaian.php?id=`+getCookie('immanuel_admin_activity')+`" class="waves-effect waves-light btn indigo darken-2">Penilaian</a>`);
  // $('#button_upload-container').html(`<a href="upload.php?id=`+getCookie('immanuel_admin_activity')+`" class="waves-effect waves-light btn indigo lighten-2">Upload</a>`);
  $('#button_upload-container').html(`<a href="javascript:alert('segera hadir, sementara minta tolong melalui admin.');" class="waves-effect waves-light btn indigo lighten-2">Upload</a>`);
});
</script>
 
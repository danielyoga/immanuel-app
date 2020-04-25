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
  $('.modal').modal();
  $('input[name=activity_id]').val(""+getCookie('immanuel_admin_activity'));
  $('#class-container').html(getCookie('immanuel_admin_class'));
  $('#button_absensi-container').html(`<a href="absensi.php?id=`+getCookie('immanuel_admin_activity')+`" class="waves-effect waves-light btn indigo darken-4">Absensi</a>`);
  $('#button_penilaian-container').html(`<a href="penilaian.php?id=`+getCookie('immanuel_admin_activity')+`" class="waves-effect waves-light btn indigo darken-2">Penilaian</a>`);
  // $('#button_upload-container').html(`<a href="upload.php?id=`+getCookie('immanuel_admin_activity')+`" class="waves-effect waves-light btn indigo lighten-2">Upload</a>`);
  $('#button_upload-container').html(`<a class="waves-effect waves-light btn indigo lighten-2 modal-trigger" href="#modal-upload">Upload</a>`);
});
</script>

  <!-- Modal Structure -->
  <div id="modal-upload" class="modal">
    <div class="modal-content">
      <!-- <h4>Upload Media Kegiatan</h4> -->
      <br>
      <form id="form_upload_media" method="POST">

      <!-- Profile Picture -->

      <div class="row">
          <div class="col m3"></div>
          <div class="col s12 m6 center">
              <img id="preview_photo" src="./Registrasi_files/register" width="70%">
              <br><br>
              <div class="file-field input-field">
              <div class="btn">
                <span>File</span>
                <input type="file" id="input_photo" accept="image/*" required>
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
          </div>
          <div class="col m3"></div>
      </div>

      <!-- Photo Input -->
        
      <div class="row" style="display:none">
          <div class="col m3"></div>
          <div class="input-field col s12 m6" id="photo-group">
            <input id="photo" name="photo" type="text" class="validate" value=" ">
            <label class="active" for="photo">Photo</label>
          </div>
          <div class="col m3"></div>
      </div>

      <script>
        function readFile() {
          if (this.files && this.files[0]) {
            var FR= new FileReader();
            FR.addEventListener("load", function(e) {
              document.getElementById("preview_photo").src  = e.target.result;
              document.getElementById("photo").value        = e.target.result;
            }); 
            FR.readAsDataURL( this.files[0] );
          }
        }
        document.getElementById("input_photo").addEventListener("change", readFile);
      </script>

      <!-- activity Id -->
        
      <div class="row" style="display:none;">
          <div class="col m3"></div>
          <div class="input-field col s12 m6" id="parent_id-group">
            <input id="activity_id" name="activity_id" type="text" class="validate" value=" ">
            <label class="active" for="activity_id">Activity ID</label>
          </div>
          <div class="col m3"></div>
      </div>

    </div>
    <div class="modal-footer">
      <a href="" class="modal-close waves-effect waves-green btn-flat">Close</a>
      <button type="submit" class="waves-effect waves-green btn-flat">Submit</a>
      </form>
    </div>
  </div>

  <script>
  // ====================================
// submit form
// ====================================

    $(document).on('submit', '#form_upload_media', function(e){

    e.preventDefault();

    // get form data
    var sign_up_form=$(this);
    var form_data=JSON.stringify(sign_up_form.serializeObject());

    // submit form data to api
    $.ajax({
        url: "https://immanuelkids-app.com/api-v1/medias/create.php",
        type : "POST",
        contentType : 'application/json',
        data : form_data,
        success : function(result) {
            M.toast({
                html: 'Media has been added.', 
                outDuration: 1000
            });
            sign_up_form.find('input').val('');
        },
        error: function(xhr, resp, text){
            M.toast({html: 'Error, please call admin.'});
        }
    });

    return false;
    });

    // function to make form values to json format
    $.fn.serializeObject = function(){

    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
    };
</script>
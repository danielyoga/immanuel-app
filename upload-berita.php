<!DOCTYPE html>
<html>
  <head>
    <!-- Specify the character encoding for the HTML document -->
    <meta charset="UTF-8">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    <!-- Compiled minified Jquery -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Immanuel Kids- Upload Berita</title>
</head>
<body>
    <!-- logo immanuel kids -->
<div class="container">

      <div class="row">
        <div class="col m2 l4"></div>
        <div class="col s12 m8 l4">
            <img class="responsive-img" src="./view/img/logo.png" alt="">
        </div>
        <div class="col m2 l6"></div>
      </div>
    

    <!-- register -->
    <h1 class="center-align flow-text" style="color: #001D39; font-weight: 700;">Tambah Berita</h4>
      
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

        <!-- Tanggal -->       
        <div class="row">
          <div class="col s3"></div>
          <div class="input-field col s6" id="username">
            <input id="date" name="date" type="text">
            <label class="active" for="date">tanggal</label>
          </div>
          <div class="col s3"></div>
        </div>


        <div class="row">
          <div class="col s12 center">
                <button class="btn col s6 light-blue darken-4" type="submit" name="action" style="float:none;">
                 Submit <i class="material-icons right">send</i>
                </button>
          </div>
        </div>
        
      </form>
</div>




<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-alpha.4/js/materialize.min.js"></script>
  
  <script>

    $(document).ready(function(){
        $('#date').datepicker({format: 'yyyy-mm-dd'});
    });

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
        url: "https://immanuelkids-app.com/api/events/create.php",
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
    
</body>
</html>
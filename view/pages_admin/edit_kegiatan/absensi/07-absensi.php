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
    <title>belajar materialize</title>

  </head>

  <body>
    
  <!-- NAVBAR -->
  <?php require '../../../global/admin/navbar_admin.php' ?>
  <?php require '../../../global/admin/topbar_admin.php' ?>

  <!-- button back to kegiatan detail -->
  <div class="container center-align">
  <a href="../../05-detail-kegiatan/05-detail-kegiatan.php" class="waves-effect waves-light btn">Back to detail kegiatan</a>
  </div>

      <!-- table -->
      <table class="centered striped">
        <thead>
          <tr>
              <th>Nama Anak</th>
              <th>Kehadiran</th>
          </tr>
        </thead>

        <tbody>

    <!-- row table -->
          <tr>
            <td id="nama_anak">Alvin</td>
            <td id="kehadiran">
              <!-- radio button kehadiran -->
            <form action="#">

              <p>
                <label>
                <input name="kehadiran" type="radio" value="hadir"/>
                <span>Hadir</span>
                </label>
                <label>
                <input name="kehadiran" type="radio" value="tidak_hadir"/>
                <span>Tidak Hadir</span>
                </label>
              </p>
              
              </form>
            </td>
            
          </tr>

          <tr>
            <td id="nama_anak">Alvin</td>
            <td id="kehadiran">
              <!-- radio button kehadiran -->
            <form action="#">

              <p>
                <label>
                <input name="kehadiran" type="radio" value="hadir"/>
                <span>Hadir</span>
                </label>
                <label>
                <input name="kehadiran" type="radio" value="tidak_hadir"/>
                <span>Tidak Hadir</span>
                </label>
              </p>
              
              </form>
            </td>
            
          </tr>

          <tr>
            <td id="nama_anak">Alvin</td>
            <td id="kehadiran">
              <!-- radio button kehadiran -->
            <form action="#">

              <p>
                <label>
                <input name="kehadiran" type="radio" value="hadir"/>
                <span>Hadir</span>
                </label>
                <label>
                <input name="kehadiran" type="radio" value="tidak_hadir"/>
                <span>Tidak Hadir</span>
                </label>
              </p>
              
              </form>
            </td>
            
          </tr>
        </tbody>
      </table>


            
  <script>
      function copybtn() {
    /* Get the text field */
    var copyText = document.getElementById("myInput");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /*For mobile devices*/

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    alert("Copied the text: " + copyText.value);
  }
  </script>

</body>
</html>
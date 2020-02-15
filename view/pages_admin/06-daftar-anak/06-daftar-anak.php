  <!-- NAVBAR -->
  <?php require '../../global/admin/navbar_admin.php' ?>
  <?php require '../../global/admin/topbar_admin.php' ?>

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

    <link rel="stylesheet" href="05-profile.css">

  </head>

  <body>
    



      <table class="centered striped responsive-table">
        <thead>
          <tr>
              <th>Nama Anak</th>
              <th>Nama Orang Tua</th>
              <th>No. Telp</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td id="nama_anak">Alvin</td>
            <td id="nama_orangtua">Bapak Eclair</td>
            <td id="nomor_telepon">08585842392</td>
            <td>
              <input type="text" id="test" value="123" readonly class="test">

              <style>
              .test input[type=text]:focus {
              border-bottom: 0px solid #ffff;
              box-shadow: 0 0 0 0 #000;
            }

              .test input:focus {
              border-bottom: 1px solid red !important;
              box-shadow: 0 1px 0 0 red !important
            }
            </style>
            </td>
            <td>
              <button id="copybtn" class="btn-small" onclick="copybtn()">Copy text</button>
            </td>
          </tr>
          
        </tbody>
      </table>
            
  <script>
      function copybtn() {
    /* Get the text field */
    var copyText = document.getElementById("test");

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
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
    
  <!-- NAVBAR -->
  <?php require '../../../global/admin/navbar_admin_pembina.php' ?>
  <?php require '../../../global/admin/topbar_admin_pembina.php' ?>

  <!-- button back to kegiatan detail -->
  <div class="container center-align">
  <a href="../../05-detail-kegiatan/05-detail-kegiatan.php" class="waves-effect waves-light btn">Back to detail kegiatan</a>


    <table class="responsive-table">
      <thead>
        <tr>
          <th data-field="nama_anak" style="margin-bottom: 20px;">Name</th>
          <th data-field="alkitab">Alkitab</th>
          <th data-field="book-of-truth">Book of Truth</th>
          <th data-field="pelayanan">pelayanan</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <td>Alvin</td>
          <td>   <form action="#" required>
            <!-- radio button alkitab -->
            <p>
              <label>
                <input name="group1" type="radio" value="yes" />
                <span>membawa</span>
              </label>
            </p>

            <p>
              <label>
                <input name="group1" type="radio" value="no" />
                <span>tidak membawa</span>
              </label>
            </p>
          </form>
        </td>

        <td>   <form action="#" required>
            <!-- radio button book of truth -->
            <p>
              <label>
                <input name="group1" type="radio" value="yes" />
                <span>membawa</span>
              </label>
            </p>

            <p>
              <label>
                <input name="group1" type="radio" value="no" />
                <span>tidak membawa</span>
              </label>
            </p>
          </form>
        </td>

        </tr>

      </tbody>
    </table>

    </div> <!-- container div end-->
            
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
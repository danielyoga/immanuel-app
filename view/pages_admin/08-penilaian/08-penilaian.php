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
  <?php require '../../global/admin/navbar_admin_pembina.php' ?>
  <?php require '../../global/admin/topbar_admin_pembina.php' ?>


      <!-- table header -->
      <table class="centered striped">
    

        <!-- table -->
        <tbody>
          <tr>
            <td id="nama_anak" style="font-weight:bold;">Nama Anak</td>
            <td id="nama_anak">Yoga</td>
          </tr>

          <tr>
            <!-- radio button alkitab -->
            <td id="kehadiran" style="font-weight:bold;">Alkitab</td>
            <td>
              <form action="#">
                <p>
                  <label>
                  <input name="alkitab" type="radio" value="alkitab"/>
                  <span>Membawa</span>
                  </label>
                  <label>
                  <input name="alkitab" type="radio" value="tidak_bawa_alkitab"/>
                  <span>Tidak</span>
                  </label>
                </p>
            </td>
          </tr>

          <tr>
            <td id="book-of-truth" style="font-weight:bold;">Book of Truth</td>
              <!-- radio button book of truth -->
            <td id="book of truth radio button">
              <p>
                <label>
                <input name="book-of-truth" type="radio" value="alkitab"/>
                <span>Membawa</span>
                </label>
                <label>
                <input name="book-of-truth" type="radio" value="tidak_bawa_alkitab"/>
                <span>Tidak</span>
                </label>
              </p>
            </td>
          </tr>
          

          <tr>

            

            <td id="alkitab">
              
            

            
            

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
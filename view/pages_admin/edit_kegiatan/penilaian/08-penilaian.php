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
  <?php require '../view/global/admin/navbar_detail_class.php' ?>

  <br>
  <h1 class="center">Penilaian</h1>
  <br><br>

  <div class="container center-align">
  
  <form action="#">
    <table class="responsive-table">
      <thead>
        <tr>
          <th data-field="nama_anak" style="margin-bottom: 20px;">Name</th>
          <th data-field="alkitab" colspan="2">Alkitab</th>
          <th data-field="book-of-truth" colspan="2">Book of Truth</th>
          <th data-field="pelayanan" colspan="2">pelayanan</th>
        </tr>
      </thead>
      <tbody>

        <!-- nama = alvin -->
        <tr>
          <td>Alvin</td>
          <td>   
            <!-- radio button alkitab -->
            <a href="#" class="waves-effect waves-light btn">Button</a>
            
              <label>
                <input name="group1" type="radio" value="yes" />
                <span>membawa</span>
              </label>
          </td>

          <td>
              <label>
                <input name="group1" type="radio" value="no" />
                <span>tidak membawa</span>
              </label> 
          </td>

        <td>  
            <!-- radio button book of truth -->
            
              <label>
                <input name="group1" type="radio" value="yes" />
                <span>membawa</span>
              </label>

        </td>

          <td>
              <label>
                <input name="group1" type="radio" value="no" />
                <span>tidak membawa</span>
              </label>    
          </td>

        <td>  
            <!-- radio button book of truth -->
            
              <label>
                <input name="group1" type="radio" value="yes" />
                <span>ya</span>
              </label>
        </td>

          <td>
           
              <label>
                <input name="group1" type="radio" value="no" />
                <span>tidak</span>
              </label>
         
        </td>

        </tr>


      </tbody>
    </table>
    </form>

    </div> <!-- container div end-->
            
</body>
</html>
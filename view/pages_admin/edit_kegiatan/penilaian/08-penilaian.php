<!-- GLOBAL HEAD -->
<?php require '../view/global/head.php' ?>
<title>Immanuel Kids - Penilaian</title>
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
          <th>Name</th>
          <th>Nilai 1</th>
          <th>Nilai 2</th>
          <th>Nilai 3</th>
        </tr>
      </thead>
      <tbody>
      
        <tr>
          <td style="font-weight:bold;">Alvin</td>
          <td><a class="waves-effect waves-light btn" >Vote</a></td>
          <td><a class="waves-effect waves-light btn" >Vote</a></td>
          <td><p><label><input type="checkbox" checked="checked" disabled="disabled" /><span>Scored</span></label></p></td>
        </tr>

        <tr>
          <td style="font-weight:bold;">Alvin</td>
          <td><p><label><input type="checkbox" checked="checked" disabled="disabled" /><span>Scored</span></label></p></td>
          <td><p><label><input type="checkbox" checked="checked" disabled="disabled" /><span>Scored</span></label></p></td>
          <td><a class="waves-effect waves-light btn" >Vote</a></td>
        </tr>


      </tbody>
    </table>
    </form>

    </div> <!-- container div end-->
            
</body>
</html>
<!-- GLOBAL HEAD -->
<?php require '../view/global/head.php' ?>

<title>Immanuel Kids - Daftar Anak</title>
</head>

<body>
<!-- NAVBAR -->
<?php require '../view/global/admin/navbar_detail_class.php' ?>

<br>
<h1 class="center">Daftar Anak</h1>
<br><br>

  <table class="centered striped responsive-table">
    <thead>
      <tr>
          <th>Nama Anak</th>
          <th>Nama Orang Tua</th>
          <th>No. Telp</th>
          <th>Action</th>
      </tr>
    </thead>
    <tbody id="daftar-anak">
      <!-- table list anak -->
    </tbody>
  </table>
            
  <script src="../view/pages_admin/06-daftar-anak/daftar-anak.js"></script>
  <script>
  function copybtn(id_input) {
    /* Get the text field */
    var copyText = document.getElementById(id_input);

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
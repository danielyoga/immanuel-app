<!-- GLOBAL HEAD -->
<?php require '../view/global/head-native.php' ?>
<title>Immanuel Kids - Alasan Ketidakhadiran</title>
<link rel="stylesheet" href="../view/pages_admin/08-alasan-ketidakhadiran/css/datatables.min.css" type="text/css">
</head>
<body>
<a href="javascript:window.location=history.back();">Back to home</a>

<br><br>
<h1 style="text-align:center;">Alasan Ketidakhadiran</h1>
<br><br>
    <div class="container">
    <table id="alasan_ketidakhadiran" class="display">
        <thead>
            <tr>
                <th>Nama Anak</th>
                <th>Nama Orang Tua</th>
                <th>Alasan Ketidakhadiran</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>test</td>
            <td>test</td>
            <td>test</td>
            <td>test</td>
            </tr>
        </tbody>
    </table>
</div> <!-- end container table-->

<script type="text/javascript" src=../view/pages_admin/08-alasan-ketidakhadiran/js/jquery.js></script>
<script type="text/javascript" src=../view/pages_admin/08-alasan-ketidakhadiran/js/datatables.min.js></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#alasan_ketidakhadiran").DataTable();
    })
</script>
</body>
</html>
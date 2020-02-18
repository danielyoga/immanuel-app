<?php
require('fpdf.php');

class PDF extends FPDF{

            // Load data
            function LoadData($file)
            {
                // Read file lines
                $lines = file($file);
                $data = array();
                foreach($lines as $line)
                    $data[] = explode(',',trim($line));
                return $data;
            }

            // Simple table
            function BasicTable($header, $data)
            {
                // Header
                foreach($header as $col)
                    $this->Cell(40,7,$col,1);
                $this->Ln();
                // Data
                foreach($data as $row)
                {
                    foreach($row as $col)
                        $this->Cell(40,6,$col,1);
                    $this->Ln();
                }
            }
}



// =========================
// safe handling
// =========================

if(!isset($_COOKIE['jwt'])) {
    echo '<script type="text/javascript">'.
     'history.go(-1)'.
     '</script>';
}



// =========================
// config db
// =========================

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "immanuel_kids_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// =========================
// count total activity
// =========================

$sql = "SELECT * FROM activities WHERE activity_class_id = " . $_GET['id'];
$result = mysqli_query($conn, $sql);
$TOTAL_ACTIVITY = mysqli_num_rows($result);
echo 'Total Activity: ' . $TOTAL_ACTIVITY;


// =========================
// count total attend
// =========================

$sql = "SELECT * FROM attendances attend JOIN activities activity ON attend.activity_id = activity.activity_id WHERE activity.activity_class_id = " . $_GET['id'];

$result = mysqli_query($conn, $sql);
$TOTAL_ACTIVITY = mysqli_num_rows($result);
echo 'Total Activity: ' . $TOTAL_ACTIVITY;






// =========================
// generate TXT
// =========================

// $myfile = fopen( $_COOKIE['immanuel_admin_class'] . ".txt", "w") or die("Unable to open file!");
// $txt = "a,a,a,a,a\nb,b,b,b,b,b";
// fwrite($myfile, $txt);
// fclose($myfile);



// =========================
// generate PDF
// =========================
// $pdf = new PDF();
// // Column headings
// $header = array('Name');
// // Data loading
// $data = $pdf->LoadData($_COOKIE['immanuel_admin_class'] . '.txt');
// $pdf->SetFont('Arial','',14);
// $pdf->AddPage();

// // Logo
// $pdf->Image('logo.png',5,0,30);
// $pdf->Cell(3,40,'Kelas: ' . $_COOKIE['immanuel_admin_class']);

// $pdf->Ln();

// $pdf->BasicTable($header,$data);
// $pdf->Output('D', $_COOKIE['immanuel_admin_class'] . '-' . date("Y-m-d") . '.pdf');

?>
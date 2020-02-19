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
                    $this->Cell(37,7,$col,1);
                $this->Ln();
                // Data
                foreach($data as $row)
                {
                    foreach($row as $col)
                        $this->Cell(37,6,$col,1);
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
// echo 'Total Activity: ' . $TOTAL_ACTIVITY . '<br><br>';


// =========================
// count total attend
// =========================

$ARRAY_REPORT = array();

$sql = "SELECT * FROM attendances attend JOIN activities activity ON attend.activity_id = activity.activity_id JOIN children child ON attend.child_id = child.children_id WHERE activity.activity_class_id = " . $_GET['id'] . " ORDER BY child.child_name ASC";

$result = mysqli_query($conn, $sql);

    $temp_name = "temp_name";
    $count_kehadiran = 0;
    $total_kehadiran = 0;

        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            if($temp_name != $row["child_name"]){
                // every new name
                $count_kehadiran = 0;
                $temp_name = $row["child_name"];

                $ARRAY_REPORT[$temp_name] = array();
            }

            if($temp_name == $row["child_name"]){
                if($row["isAttend"] == "1") {$count_kehadiran++;}

                if($temp_name != "temp_name"){
                    // always up to date in here
                    $ARRAY_REPORT[$temp_name] = array( "hadir" => $count_kehadiran );
                }
            }

        }
        // echo 'ARRAY_REPORT: ';
        // print_r($ARRAY_REPORT);
        // echo '<br><br>';





// =========================
// Count penilaian
// =========================

$ARRAY_NILAI = array();

$sql = "SELECT * FROM reports report JOIN activities activity ON report.activity_id = activity.activity_id JOIN children child ON report.child_id = child.children_id WHERE activity.activity_class_id = " . $_GET['id'] . " ORDER BY child.child_name ASC";

$result = mysqli_query($conn, $sql);


    $array_parameter = array();

    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       array_push($array_parameter, $row['input']);
    }

    $array_parameter = array_unique($array_parameter);
    // print_r($array_parameter);
    // echo "<br><br>";

    $array_value = array_fill(0, count($array_parameter), 0);
    // print_r($array_value);
    // echo "<br><br>";
    
    $temp_name = "temp_name";

        $result = mysqli_query($conn, $sql);

        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {  

            if($temp_name != $row["child_name"]){
                // every new name
                for($i=0; $i < count($array_parameter); $i++){
                    $array_value[$i] = 0;
                }
                $temp_name = $row["child_name"];
            }

            if($temp_name == $row["child_name"]){

                // vote counting
                for($i=0; $i < count($array_parameter); $i++){
                    if($row["input"] == $array_parameter[$i]){
                        if($row["value"] == "1"){
                            $array_value[$i] += 1;                            
                        }
                    }
                }

                if($temp_name != "temp_name"){
                    // always up to date in here
                    for($i=0; $i < count($array_parameter); $i++){
                        $ARRAY_REPORT[$temp_name] += array( $array_parameter[$i]  => $array_value[$i] );

                        $ARRAY_REPORT[$temp_name][$array_parameter[$i]] = $array_value[$i];
                    }
                }

            } // end if same name

        } // end while




// =========================
// generate TXT
// =========================

$myfile = fopen( $_COOKIE['immanuel_admin_class'] . ".txt", "w") or die("Unable to open file!");

$txt = "";
foreach($ARRAY_REPORT as $name => $nilai) {
    //emphasize
    if(strlen($name) > 14){
        $name = trim($name, substr($name, 14, strlen($name)));
    }
    $txt .= $name;
    foreach($nilai as $input => $value){
        $txt .=  "," . $value . " (" . number_format((float) ($value/$TOTAL_ACTIVITY)*100, 2, '.', '') . "%)";
    }
    $txt .= "\n";
}

fwrite($myfile, $txt);
fclose($myfile);



// =========================
// generate PDF
// =========================
$pdf = new PDF();
// Column headings
$header = array('Name', 'Hadir');
$header = array_merge($header, $array_parameter);
// Data loading
$data = $pdf->LoadData($_COOKIE['immanuel_admin_class'] . '.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();

// Logo
$pdf->Image('logo.png',5,0,30);
$pdf->Cell(3,40,'Kelas: ' . $_COOKIE['immanuel_admin_class']);
$pdf->Cell(-3,55,'Total Kegiatan: ' . $TOTAL_ACTIVITY);

$pdf->Ln();

$pdf->BasicTable($header,$data);
$pdf->Output('D', $_COOKIE['immanuel_admin_class'] . '-' . date("Y-m-d H:i:s") . '.pdf');

?>
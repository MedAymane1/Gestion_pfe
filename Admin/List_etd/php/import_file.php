<?php

include_once "../../../db_conn.php";
require "../../../Libraries/vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if( isset($_POST["import"]) ) {
    if( isset($_FILES["excel"]) ) {
        if( !empty($_FILES["excel"]["name"]) ) {
            $file_name = $_FILES["excel"]["name"];
            $file_ex = pathinfo($file_name, PATHINFO_EXTENSION);

            $allowed_ex = array('csv', 'xls', 'xlsx', 'xlsm');
            if (in_array($file_ex, $allowed_ex)) {
                $path = $_FILES["excel"]["tmp_name"];
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
                $data = $spreadsheet->getActiveSheet()->toArray();

                try {
                    $header_list = 0;
                    $conn->beginTransaction();
                    $stmt = $conn->prepare("INSERT INTO liste_etd VALUES (?,?,?,?)");
                    foreach ($data as $row) {
                        if($header_list > 0) {
                            $stmt->execute(array($row[0], "$row[1]", "$row[2]", "$row[3]"));
                        }
                        else {
                            $header_list = 1;
                        }
                    }
                    $conn->commit();
                }
                catch(Exception $e) {
                    $conn->rollBack();
                    die("Error: " . $e->getMessage());
                }
            }
            else {
                echo "extension not valid";
            }
        }
        else {
            echo "empty";
        }
    }
    else {
        echo "file";
    }
}
else {
    echo "btn";
}

?>

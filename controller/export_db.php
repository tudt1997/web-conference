<?php
include('config.php');
$setSql = "SELECT * FROM users";
$setRec = mysqli_query($conn, $setSql);

$columnHeader = '';
for ($i = 0; $i < mysqli_num_fields($setRec); $i++) {
    $columnHeader .= mysqli_fetch_field_direct($setRec,$i)->name . "\t";
}
$setData = '';

while ($rec = mysqli_fetch_row($setRec)) {
    $rowData = '';
    foreach ($rec as $value) {
        $value = '"' . $value . '"' . "\t";
        $rowData .= $value;
    }
    $setData .= trim($rowData) . "\n";
}


header("Content-type: application/octet-stream; charset=utf-8");
header("Content-Disposition: attachment; filename=Users.xls; charset=utf-8");
header("Pragma: no-cache");
header("Expires: 0");
echo ucwords($columnHeader) . "\n";
echo $setData;
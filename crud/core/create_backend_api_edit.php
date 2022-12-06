<?php

$string = "<?php
require 'koneksi.php';

\$input = file_get_contents('php://input');
\$data = json_decode(\$input,true);

\$pesan = [];
";
$field = [];
$string .= "\n\$" . $pk . "=trim(\$data['". $pk ."']);";
foreach ($non_pk as $row) {
    $string .= "\n\$" . $row['column_name'] . "=trim(\$data['". $row['column_name'] ."']);";
    $field[] = $row['column_name'];
}
$panjang = count($field);
$string .= "

if("; 
$urut =1;
foreach ($field as $isi) { 
    if ($panjang == $urut) {
        $string.="\$".$isi."!=''"; 
    }else{
        $string.="\$".$isi."!='' and "; 
    }
    $urut++;
}
$string .= "){"; 
$string .= "
\$query = mysqli_query(\$koneksi,\"update ".$nama_class." set "; 
$urut =1;
foreach ($field as $isi) { 
    if ($panjang == $urut) {
        $string.=$isi."='\$".$isi."'"; 
    }else{
        $string.=$isi."='\$".$isi."',"; 
    }
    $urut++;
}
    $string .= " where " . $pk . "='\$" . $pk . "'\");
}
echo json_encode(\$pesan);
echo mysqli_error(\$koneksi);
";


$string .= "\n\n\n\n/* End of file  */

/* Created at " . date('Y-m-d H:i:s') . " */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */";

$hasil_backend_edit = createFile($string,"../../../".$nama_api."/" . $api_edit);

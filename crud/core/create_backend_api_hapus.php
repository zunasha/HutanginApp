<?php
$string = "<?php
require 'koneksi.php';

\$input = file_get_contents('php://input');
\$data = json_decode(\$input,true);
\$pesan = [];
\$".$pk." = \$_GET['".$pk."'];
\$query = mysqli_query(\$koneksi,\"delete from ".$nama_class." where ".$pk."='\$".$pk."'\");

if (\$query) {
	http_response_code(201);
	\$pesan['status'] = 'sukses';
}else{
	http_response_code(422);
	\$pesan['status'] = 'gagal';
}
"; 

    $string .= "
echo json_encode(\$pesan);
echo mysqli_error(\$koneksi);
";


$string .= "\n\n\n\n/* End of file  */

/* Created at " . date('Y-m-d H:i:s') . " */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */";

$hasil_backend_hapus = createFile($string,"../../../".$nama_api."/" . $api_hapus);

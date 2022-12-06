

<?php

$string = "
<?php 
require 'koneksi.php';
\$data = [];
\$".$pk." = \$_GET['".$pk."'];
\$query = mysqli_query(\$koneksi,\"select * from ".$nama_class." where ".$pk." ='\$".$pk."'\");
\$jumlah = mysqli_num_rows(\$query);
if (\$jumlah == 1) {
	\$row = mysqli_fetch_object(\$query);
	\$data = \$row;
}

echo json_encode(\$data);
echo mysqli_error(\$koneksi);

";


$string .= "\n\n\n\n/* End of file  */

/* Created at " . date('Y-m-d H:i:s') . " */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */";

$hasil_backend_lihat = createFile($string,"../../../".$nama_api."/" . $api_lihat);

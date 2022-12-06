<?php

$string = "
<?php 
require 'koneksi.php';
\$data = [];
\$urutan_list = 1;
\$query = mysqli_query(\$koneksi,'select * from ".$nama_class."');
while (\$row = mysqli_fetch_object(\$query)) {
    \$row->urutan_list = \$urutan_list++;
	\$data[] = \$row;

}
//tampilkan data dalam bentuk json
echo json_encode(\$data);
echo mysqli_error(\$koneksi);


";


$string .= "\n\n\n\n/* End of file  */

/* Created at " . date('Y-m-d H:i:s') . " */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */";

$hasil_backend_tampil = createFile($string,"../../../".$nama_api."/" . $api_tampil);

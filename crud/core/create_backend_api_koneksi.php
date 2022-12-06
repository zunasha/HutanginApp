<?php

$string = "
<?php 
//header untuk menangani cors policy
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, HEAD, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With');
header('Content-Type: application/json; charset=utf-8');
//membuat variable koneksi ke mysql
\$koneksi = mysqli_connect('".$konfigurasi_database['host']."','".$konfigurasi_database['user']."','".$konfigurasi_database['password']."','".$konfigurasi_database['database']."') or die ('koneksi gagal');
";


$string .= "\n\n\n\n/* End of file  */

/* Created at " . date('Y-m-d H:i:s') . " */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */";

$hasil_koneksi = createFile($string,"../../../".$nama_api."/" . $api_koneksi);

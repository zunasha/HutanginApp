<?php
require 'koneksi.php';

$input = file_get_contents('php://input');
$data = json_decode($input,true);
$pesan = [];
$id = $_GET['id'];
$query = mysqli_query($koneksi,"delete from listhutang where id='$id'");

if ($query) {
	http_response_code(201);
	$pesan['status'] = 'sukses';
}else{
	http_response_code(422);
	$pesan['status'] = 'gagal';
}

echo json_encode($pesan);
echo mysqli_error($koneksi);




/* End of file  */

/* Created at 2022-12-06 15:16:59 */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */
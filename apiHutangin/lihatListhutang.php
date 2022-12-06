
<?php 
require 'koneksi.php';
$data = [];
$id = $_GET['id'];
$query = mysqli_query($koneksi,"select * from listhutang where id ='$id'");
$jumlah = mysqli_num_rows($query);
if ($jumlah == 1) {
	$row = mysqli_fetch_object($query);
	$data = $row;
}

echo json_encode($data);
echo mysqli_error($koneksi);





/* End of file  */

/* Created at 2022-12-06 15:16:59 */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */
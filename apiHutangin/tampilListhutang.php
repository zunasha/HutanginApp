
<?php 
require 'koneksi.php';
$data = [];
$urutan_list = 1;
$query = mysqli_query($koneksi,'select * from listhutang');
while ($row = mysqli_fetch_object($query)) {
    $row->urutan_list = $urutan_list++;
	$data[] = $row;

}
//tampilkan data dalam bentuk json
echo json_encode($data);
echo mysqli_error($koneksi);






/* End of file  */

/* Created at 2022-12-06 15:16:59 */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */
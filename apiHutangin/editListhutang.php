<?php
require 'koneksi.php';

$input = file_get_contents('php://input');
$data = json_decode($input,true);

$pesan = [];

$id=trim($data['id']);
$nama_penghutang=trim($data['nama_penghutang']);
$tanggal_hutang=trim($data['tanggal_hutang']);
$batas_tanggal_hutang=trim($data['batas_tanggal_hutang']);
$jumlah_hutang=trim($data['jumlah_hutang']);

if($nama_penghutang!='' and $tanggal_hutang!='' and $batas_tanggal_hutang!='' and $jumlah_hutang!=''){
$query = mysqli_query($koneksi,"update listhutang set nama_penghutang='$nama_penghutang',tanggal_hutang='$tanggal_hutang',batas_tanggal_hutang='$batas_tanggal_hutang',jumlah_hutang='$jumlah_hutang' where id='$id'");
}
echo json_encode($pesan);
echo mysqli_error($koneksi);




/* End of file  */

/* Created at 2022-12-06 15:16:59 */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */
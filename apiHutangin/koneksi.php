
<?php 
//header untuk menangani cors policy
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, HEAD, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
header('Content-Type: application/json; charset=utf-8');
//membuat variable koneksi ke mysql
$koneksi = mysqli_connect('localhost','root','','hutanginapp_db') or die ('koneksi gagal');




/* End of file  */

/* Created at 2022-12-06 15:16:59 */
/* Mohammad Irham Akbar CRUD IONIC 6 Angular */
<?php
require_once '../assets/configuration/konek.php';



require_once("../assets/dompdf/dompdf_config.inc.php");

$id = $_GET['print'];
$query = mysqli_query($konek, "select * from pegawai where id='$id'");
$t = mysqli_fetch_array($query);
$no = str_replace("", "_", strtolower($t['no_peg']));
$nama = $t['nama_peg'];
$jabatan = $t['jabatan'];
$alamat = $t['alamat'];
$telp = $t['no_telp'];
$username = $t['username'];
$password = $t['password'];


$html =
'<html><body>'.
'<div align="center"><h3>Data Pegawai beranama '.$nama.'</h3></div>'.
'<br><br><br><table>

<tr>
  <td>Nama :</td>
  <td>'.$nama.'</td>
</tr>

<tr>
  <td>Jabatan :</td>
  <td>'.$jabatan.'</td>
</tr>

<tr>
  <td>Alamat :</td>
  <td>'.$alamat.'</td>
</tr>

<tr>
  <td>No Telp :</td>
  <td>'.$telp.'</td>
</tr>

<tr>
  <td>Username :</td>
  <td>'.$username.'</td>
</tr>

<tr>
  <td>Password :</td>
  <td>'.$password.'</td>
</tr>

</table>'.
'</body></html>';

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper("A4", "potrait");
$dompdf->render();
$dompdf->stream("pegawai_".$nama.".pdf");
 ?>

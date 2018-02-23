<?php
ob_start();
session_start();
require_once("../assets/configuration/konek.php");
if (empty($_SESSION['username'])) {
  header("Location: ../index.php");
}
?>
<html>
<head>
  <title>Print</title>
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<style type="text/css">
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<body>
    <?php
      $id = $_GET['print'];
      $query = mysqli_query($konek, "select * from surat_keluar where id='$id'");
      $t = mysqli_fetch_array($query);
      $no = str_replace("", "_", strtolower($t['kd_sukel']));
      $no_sukel = $t['no_sukel'];
      $tgl_sukel = $t['tgl_sukel'];
      $instansi = $t['instansi'];
      $judul = $t['judul_sukel'];
      $isi_sukel = $t['isi_sukel'];
      $file_sukel = $t['file_sukel'];
    ?>
<b>Data Surat Keluar Dengan Nomor surat = <?php echo $no_sukel; ?></b><br><br>
<table>
    <thead>
      <tr>
        <th>Kode Sukel</th>
        <th>No Sukel</th>
        <th>Tanggal Sukel</th>
        <th>Instansi Dituju</th>
        <th>Judul</th>
        <th>Isi</th>
        <th>Nama File</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $no_sukel; ?></td>
        <td><?php echo $tgl_sukel; ?></td>
        <td><?php echo $instansi; ?></td>
        <td><?php echo $judul; ?></td>
        <td><?php echo $isi_sukel; ?></td>
        <td><?php echo $file_sukel; ?></td>
      </tr>
    </tbody>
</table>
</body>
</html>
<?php
$var = ob_get_contents();
ob_end_clean();
        
require_once('../assets/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($var);
$pdf->Output("Sukel_<? $no_sukel; ?>.pdf", "D");

?>
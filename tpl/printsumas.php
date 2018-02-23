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
      $query = mysqli_query($konek, "select * from surat_masuk where id='$id'");
      $t = mysqli_fetch_array($query);
      $no = str_replace("", "_", strtolower($t['kd_sumas']));
      $no_sumas = $t['no_sumas'];
      $tgl_sumas = $t['tgl_sumas'];
      $tgl_sumasdtg = $t['tgl_sumasdtg'];
      $jns_sumas = $t['jns_sumas'];
      $judul= $t['judul'];
      $isi = $t['isi'];
      $instansi = $t['instansi'];
      $penerima = $t['penerima'];
      $nmfile = $t['file_sumas'];
    ?>
<b>Data Surat Masuk Dengan Nomor Surat = <?php echo $no_sumas; ?></b><br><br>
<table>
    <thead>
      <tr>
        <th>Kode Sumas</th>
        <th>No Sumas</th>
        <th>Tanggal Sumas</th>
        <th>Tanggal Sumas Datang</th>
        <th>Jenis Sumas</th>
        <th>Judul</th>
        <th>Isi</th>
        <th>Nama Instansi</th>
        <th>Penerima</th>
        <th>Nama file</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $no_sumas; ?></td>
        <td><?php echo $tgl_sumas; ?></td>
        <td><?php echo $tgl_sumasdtg; ?></td>
        <td><?php echo $jns_sumas; ?></td>
        <td><?php echo $judul; ?></td>
        <td><?php echo $isi; ?></td>
        <td><?php echo $instansi; ?></td>
        <td><?php echo $penerima; ?></td>
        <td><?php echo $nmfile; ?></td>
      </tr>
    </tbody>
</table>
</body>
</html>
<?php
$var = ob_get_contents();
ob_end_clean();
        
require_once('../assets/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('L','A4','en');
$pdf->WriteHTML($var);
$pdf->Output("Sumas_<? $no_sumas; ?>.pdf", "D");

?>
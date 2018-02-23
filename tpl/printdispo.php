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
      $query = mysqli_query($konek, "select * from disposisi where id='$id'");
      $t = mysqli_fetch_array($query);
      $no = str_replace("", "_", strtolower($t['no_disposisi']));
      $no_sumas = $t['no_sumas'];
      $tgl_dispo = $t['tgl_dispo'];
      $penerima = $t['penerima'];
      $judul = $t['judul'];
      $catatan = $t['catatan'];
      $pengirim = $t['pengirim'];
    ?>
<b>Data Disposisi Dengan No surat masuk = <?php echo $no_sumas; ?></b><br><br>
<table>
    <thead>
      <tr>
        <th>No Disposisi</th>
        <th>No Sumas</th>
        <th>Tanggal Disposisi</th>
        <th>Penerima</th>
        <th>Judul</th>
        <th>Catatan</th>
        <th>Pengirim</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $no_sumas; ?></td>
        <td><?php echo $tgl_dispo; ?></td>
        <td><?php echo $penerima; ?></td>
        <td><?php echo $judul; ?></td>
        <td><?php echo $catatan; ?></td>
        <td><?php echo $pengirim; ?></td>
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
$pdf->Output("Dispo_<? $no_sumas; ?>.pdf", "D");

?>
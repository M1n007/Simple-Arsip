<?php
ob_start();
session_start();
require_once("../assets/configuration/konek.php");
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
<b>Data Semua Disposisi.</b><br><br>
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
    <?php
      $query = mysqli_query($konek, "select * from surat_masuk");{
      while ($t = mysqli_fetch_array($query)) {
    ?>
    <tbody>
      <tr>
      <td><?php echo $t['1']; ?></td>
      <td><?php echo $t['2']; ?></td>
      <td><?php echo $t['3']; ?></td>
      <td><?php echo $t['4']; ?></td>
      <td><?php echo $t['5']; ?></td>
      <td><?php echo $t['6']; ?></td>
      <td><?php echo $t['7']; ?></td>
      <td><?php echo $t['8']; ?></td>
      <td><?php echo $t['9']; ?></td>
      <td><?php echo $t['10']; ?></td>
      </tr>
    </tbody>
  <?php
    }
  }
  ?>
</table>
</body>
</html>
<?php
$var = ob_get_contents();
ob_end_clean();
        
require_once('../assets/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($var);
$pdf->Output("Sumas_semua.pdf", "D");

?>
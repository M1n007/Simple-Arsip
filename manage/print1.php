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
  <title></title>
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
<b>Data Semua Pegawai.</b><br><br>
<table>
    <thead>
      <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Jabatan</th>
      <th>alamat</th>
      <th>Telp</th>
      <th>Kelamin</th>
       <th><a href="editpeg.php?tambah"><font class="glyphicon glyphicon-plus"></font></a></th>
      </tr>
    </thead>
    <?php
      $query = mysqli_query($konek, "select * from pegawai limit 3");{
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
$html = ob_get_contents();
ob_end_clean();
        
require_once('../assets/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Pegawai.pdf', 'D');

?>

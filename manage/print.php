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
      $query = mysqli_query($konek, "select * from pegawai where id='$id'");
      $t = mysqli_fetch_array($query);
      $no = str_replace("", "_", strtolower($t['no_peg']));
      $nama = $t['nama_peg'];
      $jabatan = $t['jabatan'];
      $alamat = $t['alamat'];
      $telp = $t['no_telp'];
      $username = $t['username'];
      $password = $t['password'];
    ?>
<b>Data Pegawai Bernama <?php echo $nama; ?></b><br><br>
<table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jabatan</th>
        <th>alamat</th>
        <th>Telp</th>
        <th>Username</th>
        <th>Password</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $nama; ?></td>
        <td><?php echo $jabatan; ?></td>
        <td><?php echo $alamat; ?></td>
        <td><?php echo $telp; ?></td>
        <td><?php echo $username; ?></td>
        <td><?php echo $password; ?></td>
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
$pdf->Output("Pegawai_<? $nama; ?>.pdf", "D");

?>

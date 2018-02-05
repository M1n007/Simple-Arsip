<?php
ob_start();
session_start();
require_once("../assets/configuration/konek.php");
if (empty($_SESSION['username'])) {
  header("Location: ../index.php");
}
?>
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
<?php
$html = ob_get_contents();
ob_end_clean();
        
require_once('../assets/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('Data Pegawai.pdf', 'D');

?>

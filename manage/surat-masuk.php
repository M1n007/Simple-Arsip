<?php
session_start();
if (empty($_SESSION['username'])) {
  header("Location: ../index.php");
}
?>
<?php require_once('../tpl/header.php'); ?>
<?php
  if (isset($_GET['hapus'])) {
    $kd = $_GET['hapus'];
    $queryhps = "delete from surat_masuk where kd_surat='$kd'";
    $hps = $konek->query($queryhps);
    if ($hps) {
      ?>
      <script>alert('Sukses menghapus data')</script>
      <?php
        header("Location: surat-masuk.php")
       ?>
      <?php
    }else{
      ?>
      <script>alert('Gagal menghapus data')</script>
      <?php
    }
  }

 ?>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <?php require_once('../tpl/sidebar.php'); ?>
    </aside>
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side container-fluid">
        <!-- Main content -->
          <section class="content">
            <div class="row">
                <div class="">
                  <div class="panel panel-default table-responsive">
                      <form action="" method="get">
                        <table class="all table table-striped">
                          <thead>
                            <tr>
                              <th>Kode</th>
                              <th>No Surat</th>
                              <th>Tgl Surat</th>
                              <th>Tgl terima</th>
                              <th>File</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <?php
                            if (isset($_GET['cari'])) {
                              $car = $_GET['cari'];
                              $tampilkan = mysqli_query($konek, "select * from surat_masuk where judul like '%".$car."%'");
                            /*  if (mysqli_num_rows($tampilkan)==0) {
                                ?>
                                <tbody>
                                  <t>
                                    <td colspan="7">Data Tidak ditemukan.</td>
                                  </tr>
                                </tbdoy>
                                <?php
                              }*/
                            }else{
                              $tampilkan = mysqli_query($konek, "select * from surat_masuk");
                              /*if (mysqli_num_rows($tampilkan)==0) {
                                ?>
                                <tbody>
                                  <t>
                                    <td colspan="7">Tidak ada data</td>
                                  </tr>
                                </tbdoy>
                                <?php
                              }*/
                            }

                              while ($r = mysqli_fetch_array($tampilkan)){
                           ?>
                          <tbody>
                            <tr>
                              <td><?php echo $r['1']; ?></td>
                              <td><?php echo $r['2']; ?></td>
                              <td><?php echo $r['3']; ?></td>
                              <td><?php echo $r['9']; ?></td>
                              <td><a href="detail.php?detail=<?php echo $r['1']; ?>" class="btn btn-default"><font class="fa fa-eye">Detail</font></a></td>
                              <td>
                                <a href="?hapus=<?php echo $r['1']; ?>" class="btn btn-danger" onclick="return confirm('Yakin data akan dihapus ?');"><font class="glyphicon glyphicon-trash"></font></a>
                              </td>
                            </tr>
                          </tbody>
                          <?php
                          }
                           ?>
                        </table>
                    </form>
                    <table>
                      <tr>
                        <th></th>
                      <tr>
                    </table>
              </div>
             </div>
            </div>
          </section><!-- /.content -->
    </aside>
</div><!-- ./wrapper -->

<?php require_once('../tpl/pesan.php'); ?>
<?php require_once('../tpl/pesan2.php'); ?>
<?php require_once('../tpl/dispo.php'); ?>
<?php require_once('../tpl/footer.php'); ?>

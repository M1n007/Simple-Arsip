<?php
session_start();
if (empty($_SESSION['username'])) {
  header("Location: ../index.php");
}
?>
<?php require_once('../tpl/header.php'); ?>
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
                  <a href="surat-masuk.php" class="btn btn-primary"><font class="fa fa-hand-o-left">Kembali</font></a><br><br>
                  <div class="panel panel-default table-responsive">
                      <form action="" method="get">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Kode</th>
                              <th>No Surat</th>
                              <th>Tgl Surat</th>
                              <th>Tgl Diterima</th>
                            </tr>
                          </thead>
                          <?php
                              if (isset($_GET['details'])) {
                                $kode = $_GET['details'];
                                $tampilkan = mysqli_query($konek, "select * from surat_masuk where kd_sumas='$kode'");{
                                $r = mysqli_fetch_array($tampilkan);
                              }
                            }
                           ?>
                          <tbody>
                            <tr>
                              <td><?php echo $r['1']; ?></td>
                              <td><?php echo $r['2']; ?></td>
                              <td><?php echo $r['3']; ?></td>
                              <td><?php echo $r['4']; ?></td>
                            </tr>
                          </tbody>

                          <thead>
                            <tr>
                              <th>Nama Instansi :</th>
                              <th>Judul Surat :</th>
                              <th>Jenis Surat :</th>
                              <th>File :</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><?php echo $r['8']; ?></td>
                              <td><?php echo $r['6']; ?></td>
                              <td><?php echo $r['5'];?></td>
                              <td><a href="upload_sumas/<?php echo $r['10']; ?>"><?php echo $r['10']; ?></a></td>
                            </tr>
                          </tbody>

                          <thead>
                            <tr>
                              <th>Deskripsi Surat :</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><textarea class="form-control" readonly><?php echo $r['7']; ?></textarea></td>
                            </tr>
                          </tbody>

                        </table>
                    </form>
              </div>
             </div>
            </div>
          </section><!-- /.content -->
    </aside>
</div><!-- ./wrapper -->

<?php require_once('../tpl/sumas.php'); ?>
<?php require_once('../tpl/sukel.php'); ?>
<?php require_once('../tpl/footer.php'); ?>
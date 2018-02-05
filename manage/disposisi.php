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
    $queryhps = "delete from disposisi where no_disposisi='$kd'";
    $hps = $konek->query($queryhps);
    if ($hps) {
      ?>
      <script>alert('Sukses menghapus data')</script>
      <?php
        header("Location: disposisi.php")
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
                <div class="table-responsive">
                  <form action="" method="get">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>No Disposisi</th>
                          <th>No Surat</th>
                          <th>tgl disposisi</th>
                          <th>dikirim oleh</th>
                          <th>catatan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <?php
                        $pegawai = $_SESSION['no_peg'];
                        $tampilkan = mysqli_query($konek, "select * from disposisi where penerima='$pegawai'");
                        if (mysqli_num_rows($tampilkan)==0) {
                                ?>
                                <tbody>
                                  <t>
                                    <td colspan="7">Belum ada data tersedia.</td>
                                  </tr>
                                </tbdoy>
                      <?php
                        }
                        {
                          while ($r = mysqli_fetch_array($tampilkan)) {
                       ?>
                      <tbody>
                        <tr>
                          <td><?php echo $r['1']; ?></td>
                          <td><?php echo $r['2']; ?></td>
                          <td><?php echo $r['3']; ?></td>
                          <td><?php echo $r['7']; ?></td>
                          <td><?php echo $r['6']; ?></td>
                          <td>
                            <a href="detail.php?detail=<?php echo $r['1']; ?>" class="btn btn-default"><font class="fa fa-eye">Detail</font></a>
                            <a href="?hapus=<?php echo $r['1']; ?>" class="btn btn-danger" onclick="return confirm('Yakin data akan dihapus ?');"><font class="glyphicon glyphicon-trash"></font></a>
                          </td>
                        </tr>
                      </tbody>
                      <?php
                          }
                        }
                       ?>
                    </table>
                  </form>
                </div>
            </div>
          </section><!-- /.content -->
    </aside>
</div><!-- ./wrapper -->

<?php require_once('../tpl/pesan.php'); ?>
<?php require_once('../tpl/pesan2.php'); ?>
<?php require_once('../tpl/dispo.php'); ?>
<?php require_once('../tpl/footer.php'); ?>

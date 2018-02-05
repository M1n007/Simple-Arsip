<?php
session_start();
if (empty($_SESSION['username'])) {
  header("Location: ../index.php");
}
?>
<?php require_once('../tpl/header.php'); ?>
<?php
  if (isset($_GET['hapus'])) {
    $idhps = $_GET['hapus'];
    $queryhps = "delete from pegawai where no_peg='$idhps'";
    $hps = $konek->query($queryhps);
    if ($hps) {
      ?>
      <script>alert('Sukses menghapus data')</script>
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
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>alamat</th>
                        <th>Telp</th>
                        <th>Kelamin</th>
                        <th>Aksi</th>
                        <th>
                        <a href="editpeg.php?tambah"><font class="glyphicon glyphicon-plus"></font></a>
                        <a href="print1.php" class="btn btn-primary"><font class="fa fa-print"> Print All</font></a>
                        </th>
                      </tr>
                    </thead>
                    <?php
                      $query = mysqli_query($konek, "select * from pegawai limit 3");
                           if (mysqli_num_rows($query)==0) {
                                ?>
                                <tbody>
                                  <t>
                                    <td colspan="7">Belum ada data tersedia.</td>
                                  </tr>
                                </tbdoy>
                      <?php
                        }
                      {
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
                        <td>
                          <a href="editpeg.php?details=<?php echo $t['1']; ?>"><font class="fa fa-reply"></font></a>
                          <a href="?hapus=<?php echo $t['1']; ?>" onclick="return confirm('Yakin data akan dihapus ?');"><font class="glyphicon glyphicon-trash"></font></a>
                          <a href="print.php?print=<?php echo $t['0']; ?>"><font class="fa fa-print"></font></a>
                        </td>
                      </tr>
                    </tbody>
                    <?php
                        }
                      }
                     ?>
                     <tr>
                       <th><a href="index.php"><font class="fa fa-hand-o-left">Kembali</font></a></th>
                     <tr>
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

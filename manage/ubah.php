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
    <aside class="right-side">


          <!-- Main content -->
          <section class="content">

            <div class="col-lg-3">
              <?php
                if (isset($_POST['change'])) {
                  $user = $_SESSION['no_peg'];
                  $new = $_POST['ganti'];
                  $query = mysqli_query($konek, "update pegawai set password='$new' where no_peg='$user'");
                  if ($query==TRUE) {
                    echo "<script>alert('password berhasil diubah :)')</script>";
                  }else{
                    echo "<script>alert('password gagal diubah :(')</script>";
                  }
                }
               ?>
              <form method="post" action="">
                <div class="form-group">
                  <label>Password Baru</label>
                  <input type="password" class="form-control" name="ganti" placeholder="masukan password baru" />
                </div>
                <button class="btn btn-success" name="change">Ganti</button>
              </form>
            </div>

          </section><!-- /.content -->
    </aside>
</div><!-- ./wrapper -->

<?php require_once('../tpl/pesan.php'); ?>
<?php require_once('../tpl/pesan2.php'); ?>
<?php require_once('../tpl/dispo.php'); ?>
<?php require_once('../tpl/footer.php'); ?>

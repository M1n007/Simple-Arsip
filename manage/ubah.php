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
            <div class="panel panel-primary">
              <div class="panel-heading">
              </div>
              <div class="panel-body">
                <div class="col-lg-4">         
                     <font style="font-size:150px;"><span class="fa fa-user"></span></font><b> Profile ku.</b>
                </div>
                <div class="col-md-4">
                  <?php
                    $sel = $_SESSION['no_peg'];
                    $sel1 = mysqli_query($konek, "select * from pegawai where no_peg='$sel'");
                    $sel2 = mysqli_fetch_array($sel1);
                    ?>
                      <br>
                    <font>Nama : <font style="color:green;"><?php echo $sel2['nama_peg'];?></font></font><br><br>
                    <font>Jabatan : <font style="color:green;"><?php echo $sel2['jabatan'];?></font></font><br><br>
                    <font>Alamat : <font style="color:green;"><?php echo $sel2['alamat'];?></font></font><br><br>
                    <font>No Telepon : <font style="color:green;"><?php echo $sel2['no_telp'];?></font></font><br><br>
                </div>
                <div class="col-md-4">
                  <p><font style="color:red;">*Feature ini untuk merubah password pada akun anda, harap password diingat ingat atau ditulis pada secarik kertas agar tidak lupa</font></p>
                  <form method="post" action="">
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
                    <div class="form-group">
                      <label>Password Baru</label>
                      <input type="password" class="form-control" name="ganti" placeholder="masukan password baru" />
                    </div>
                    <button class="btn btn-success" name="change">Ganti</button>
                  </form>
                </div>
                </div>
              </div>

          </section><!-- /.content -->
    </aside>
        </div><!-- ./wrapper -->

        <?php require_once('../tpl/sumas.php'); ?>
        <?php require_once('../tpl/sukel.php'); ?>
        <?php require_once('../tpl/dispo.php'); ?>
        <?php require_once('../tpl/about.php'); ?>
        <?php require_once('../tpl/footer.php'); ?>


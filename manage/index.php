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

              <!-- Small boxes (Stat box) -->
              <?php
              if ($_SESSION['level'] == "admin") {
               ?>
              <div class="row">
                  <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-aqua">
                          <div class="inner">
                              <h3>
                                  <?php
                                    $pegawai = mysqli_query($konek, "select * from pegawai");{
                                   ?>
                                   <font>
                                     <?php
                                        echo mysqli_num_rows($pegawai);
                                        }
                                      ?>
                                   </font>
                              </h3>
                              <p>
                                  Pegawai
                              </p>
                          </div>
                          <div class="icon">
                              <i class="fa fa-user"></i>
                          </div>
                          <a href="pegawai.php" class="small-box-footer">
                              More info <i class="fa fa-arrow-circle-right"></i>
                          </a>
                      </div>
                  </div><!-- ./col -->
                  <?php
                    }
                   ?>
                  <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-red">
                          <div class="inner">
                              <h3>
                                <?php
                                  $penerima = $_SESSION['no_peg'];
                                  $dis = mysqli_query($konek, "select * from disposisi where penerima='$penerima'");{
                                 ?>
                                 <font>
                                   <?php
                                      echo mysqli_num_rows($dis);
                                      }
                                    ?>
                                 </font>
                              </h3>
                              <p>
                                  Disposisi
                              </p>
                          </div>
                          <div class="icon">
                              <i class="fa fa-check"></i>
                          </div>
                          <a href="disposisi.php" class="small-box-footer">
                              More info <i class="fa fa-arrow-circle-right"></i>
                          </a>
                      </div>
                  </div><!-- ./col -->

                  <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-green">
                          <div class="inner">
                              <h3>
                                <?php
                                $tampilkan = mysqli_query($konek, "select * from surat_masuk");{
                                 ?>
                                 <font>
                                   <?php
                                      echo mysqli_num_rows($tampilkan);
                                      }
                                    ?>
                                  </font>
                              </h3>
                              <p>
                                  Surat Masuk
                              </p>
                          </div>
                          <div class="icon">
                              <i class="fa fa-share"></i>
                          </div>
                          <a href="surat-masuk.php" class="small-box-footer">
                              More info <i class="fa fa-arrow-circle-right"></i>
                          </a>
                      </div>
                  </div><!-- ./col -->
                  <div class="col-lg-3 col-xs-6">
                      <!-- small box -->
                      <div class="small-box bg-yellow">
                          <div class="inner">
                              <h3>
                                <?php
                                $keluar = mysqli_query($konek, "select * from surat_keluar");{
                                 ?>
                                 <font>
                                   <?php
                                      echo mysqli_num_rows($keluar);
                                      }
                                    ?>
                                  </font>
                              </h3>
                              <p>
                                Surat Keluar
                              </p>
                          </div>
                          <div class="icon">
                              <i class="fa fa-reply"></i>
                          </div>
                          <a href="surat-keluar.php" class="small-box-footer">
                              More info <i class="fa fa-arrow-circle-right"></i>
                          </a>
                      </div>
                  </div><!-- ./col -->
              </div><!-- /.row -->
          </section><!-- /.content -->
    </aside>
</div><!-- ./wrapper -->

<?php require_once('../tpl/pesan.php'); ?>
<?php require_once('../tpl/pesan2.php'); ?>
<?php require_once('../tpl/dispo.php'); ?>
<?php require_once('../tpl/footer.php'); ?>

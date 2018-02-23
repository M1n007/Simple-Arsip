
<?php
require_once '../assets/configuration/konek.php';
session_start();
if (empty($_SESSION['username'])) {
  header("Location: ../manage/index.php");
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <title>Surat Keluar</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../assets/DataTables/global.css">
    <!-- font Awesome -->
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
</head>

<body>
<header>
<div class="container">
<div class="col-md-5">
  <a href="../index.php" target="_blank" title="Simple Aplikasi Pengarsipan Surat">
<img src="../img/logo.PNG"></a>

</div>
</div>
</header>

<div class="container">
  <div class="row">
    <div class="col-md-12">

    <div class="box box-primary">
                    <?php
                        if (isset($_GET['hapussukel'])) {
                          $idhps = $_GET['hapussukel'];
                          $queryhps = "delete from surat_keluar where kd_sukel='$idhps'";
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
                                <div class="box-header">
                                    <h3 class="box-title">Surat Keluar</h3>                                    
                                </div><!-- box-header -->
                                <div class="col-md-5">
                                  <form action="" method="get">
                                    <input type="text" class="form-control" name="cari" placeholder="cari data berdasarkan Kode Sukel...">
                                  </form>
                                </div> 
                                <br><br>
                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                                    <tr>
                                                      <th>Kode Surat</th>
                                                      <th>No Surat</th>
                                                      <th>Tgl Surat</th>
                                                      <th>instansi</th>
                                                      <th>judul surat</th>
                                                      <th>Isi</th>
                                                      <th>Aksi</th>
                                                    </tr>
                                                  </thead>
                                                  <?php 
                                                    if(isset($_GET['cari'])){
                                                      $cari = $_GET['cari'];
                                                      $data = "select * from surat_keluar where kd_sukel like '%".$cari."%'";
                                                      $data1 = $konek->query($data);
                                                      $p = mysqli_fetch_array($data1);
                                                        if ($p == TRUE) {
                                                          ?>
                                                            <tbody>
                                                                <tr>
                                                                  <td><?php echo $p['1']; ?></td>
                                                                  <td><?php echo $p['2']; ?></td>
                                                                  <td><?php echo $p['3']; ?></td>
                                                                  <td><?php echo $p['4']; ?></td>
                                                                  <td><?php echo $p['5']; ?></td>
                                                                  <td><?php echo $p['6']; ?></td>
                                                                  <td>
                                                                    <a href="detailsukel.php?details=<?php echo $t['1']; ?>"><font class="fa fa-reply"></font></></a>
                                                                    <a href="?hapussukel=<?php echo $t['1']; ?>" onclick="return confirm('Yakin data akan dihapus ?');"><font class="glyphicon glyphicon-trash"></font></a>
                                                                    <a href="../tpl/printsukel.php?print=<?php echo $t['0']; ?>"><font class="fa fa-print"></font></</a>
                                                                  </td>
                                                                </tr>
                                                              </tbody>
                                                          <?php
                                                        }else{
                                                          ?>
                                                            <tr>
                                                              <td>Data tidak ditemukan.</td>
                                                              <td></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td></td>
                                                            </tr>
                                                          <?php
                                                        }

                                                          
                                                    }else{
                                                    $query = mysqli_query($konek, "select * from surat_keluar");
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
                                                        <a href="detailsukel.php?details=<?php echo $t['1']; ?>"><font class="fa fa-reply"></font></></a>
                                                        <a href="?hapussukel=<?php echo $t['1']; ?>" onclick="return confirm('Yakin data akan dihapus ?');"><font class="glyphicon glyphicon-trash"></font></a>
                                                        <a href="../tpl/printsukel.php?print=<?php echo $t['0']; ?>"><font class="fa fa-print"></font></</a>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                  <?php
                                                    }
                                                  }
                                                   ?>
                                              <tr>
                                               <th><a href="index.php"><font class="fa fa-hand-o-left">Kembali</font></a></th>
                                               <th>
                                              <a href="../tpl/printsukelall.php"><font class="fa fa-print">Print Semua Data Surat Keluar</font></a>
                                            </th>
                  
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
</div></div></div>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/DataTables/bootstrap.min.js"></script>
<script src="../assets/DataTables/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/DataTables/datatables/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="../assets/DataTables/datatables/dataTables.bootstrap.css">
</body>
</html>
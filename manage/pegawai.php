
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
    <title>Data Pegawai</title>
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
    <div class="box-header">
          <h3 class="box-title">Data Pegawai</h3>                                    
                </div><!-- /.box-header -->
                <div class="col-md-5">
                <form action="" method="get">
                    <input type="text" class="form-control" name="cari" placeholder="cari data berdasarkan Nomor Pegawai...">
                </form>
              </div>
                    <div class="box-body table-responsive">
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
                                        <form action="" method="get">
                                          <table id="pegawai" class="table table-striped table-hover">
                                            <thead>
                                              <tr>
                                                <th>No Pegawai</th>
                                                <th>Nama</th>
                                                <th>Jabatan</th>
                                                <th>alamat</th>
                                                <th>Telp</th>
                                                <th>Kelamin</th>
                                                <th>Aksi</th>
                                              </tr>
                                            </thead>
                                            <?php 
                                                    if(isset($_GET['cari'])){
                                                      $cari = $_GET['cari'];
                                                      $data = "select * from pegawai where no_peg like '%".$cari."%'";
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
                                              $query = mysqli_query($konek, "select * from pegawai limit 10");
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
                                                  <a href="../tpl/print.php?print=<?php echo $t['0']; ?>"><font class="fa fa-print"></font></a>
                                                </td>
                                              </tr>
                                            </tbody>
                                            <?php
                                              }
                                            }
                                             ?>
                                             <tr>
                                               <th><a href="index.php"><font class="fa fa-hand-o-left">Kembali</font></a></th>
                                               <th><a href="#" data-toggle="modal" data-target="#myPeg">
                                                  <i class="fa fa-plus"></i> <span>Tambah Pegawai</span>
                                              </a></th>
                                              <th>
                                                <a href="../tpl/print1.php"><font class="fa fa-print">Print Semua Data Pegawai</font></a>
                                              </th>
                                             <tr>
                                          </table>
                                        </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
</div></div></div>
<?php
  if (isset($_POST['peg'])) {
    $nopeg = $_POST['nopeg'];
    $nama = $_POST['namapeg'];
    $jab = $_POST['jabpeg'];
    $alamat = $_POST['alamatpeg'];
    $telp = $_POST['telppeg'];
    $kelamin = $_POST['kelaminpeg'];
    $level = $_POST['levelpeg'];
    $user = $_POST['userpeg'];
    $pass = $_POST['passpeg'];
    $lahir= $_POST['lahir'];

    $up = mysqli_query($konek, "insert into pegawai(no_peg, nama_peg, jabatan, alamat, no_telp, jns_kelamin, level, username, password, pertanyaan)values('$nopeg', '$nama', '$jab', '$alamat', '$telp', '$kelamin', '$level', '$user', '$pass', '$lahir')");
    if ($up==TRUE) {
      echo "<script>alert('Tambah Data Pegawai Sukses!!')</script>";
       echo "<script>window.location.href='pegawai.php'</script>";
    }else{
      echo "<script>alert('Tambah Data Pegawai Gagal!!')</script>";
    }
}

?>
<!-- tampilan popup Tambah Pegawai -->
<div id="myPeg" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <center><font><b>Masukan Data Pegawai</b></font></center>
      </div>
      <div class="modal-body">
        <form method="POST">
          <?php
          //kode otomatis
          $que1 = $konek->query("select max(no_peg) as maxNo from pegawai");
          $data1  = mysqli_fetch_array($que1);
          $noSur1 = $data1['maxNo'];

          $noUrut1 = (int) substr($noSur1, 3, 3);
          $noUrut1++;

          $isi = "PEG";
          $newLa = $isi . sprintf("%03s", $noUrut1);
           ?>
          <div class="form-group">
            <label>No Pegawai :</label>
            <input class="form-control" type="text" name="nopeg" value="<?php echo $newLa; ?>" readonly/>
            <label>Nama :</label>
            <input class="form-control" type="text" name="namapeg" placeholder="masukan nama pegawai"  />
            <label>Jabatan :</label>
            <input class="form-control" type="text" name="jabpeg"  placeholder="masukan jabatan pegawai" />
            <label>Alamat :</label>
            <input class="form-control" type="text" name="alamatpeg" placeholder="masukan alamat pegawai"/>
            <label>Telp :</label>
            <input class="form-control" type="number" name="telppeg" placeholder="masukan no telp pegawai"/>
            <label>Kelamin :</label>
            <select class="form-control" name="kelaminpeg">
              <option class="form-control">
                laki-laki
              </option>
              <option class="form-control">
                  perempuan
              </option>
            <select>
            <label>Level :</label>
            <select class="form-control" name="levelpeg">
              <option class="form-control">
                  admin
              </option>
              <option class="form-control">
                  user
              </option>
            <select>
            <label>Username :</label>
            <input class="form-control" type="text" name="userpeg" placeholder="masukan username untuk pegawai"/>
            <label>Password :</label>
            <input class="form-control" type="text" name="passpeg" placeholder="masukan password untuk pegawai"/>
            <label>Pertanyaan Kemanan :</label>
            <input class="form-control" type="text" name="lahir" placeholder="dimana kamu lahir ?"/>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" name="peg">Send</button>
      </form>
      </div>
    </div>
  </div>
</div>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/DataTables/bootstrap.min.js"></script>
<script src="../assets/DataTables/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/DataTables/datatables/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="../assets/DataTables/datatables/dataTables.bootstrap.css">
</body>
</html>
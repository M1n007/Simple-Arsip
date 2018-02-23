<?php
################
#Create by amin#
################
include 'assets/configuration/konek.php';
session_start();

?>

<html>
  <head>
    <title>Simple Aplikasi Pengarsipan Surat</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <!--<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">-->
  </head>
<body class="body-ingin">

<div class="container">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"><center><font><b><font color="purple"><</font> <font color="#1abc9c">S</font>A<font color="#1abc9c">P</font>S <font color="purple">/></font></b></font><br><b>(Simple Aplikasi Pengarsipan Surat)</b></center></h4>
          </div>
          <div class="modal-body">
            <?php
                if (isset($_POST['change'])) {
                  $user = $_SESSION['username'];
                  $new = $_POST['ganti'];
                  $query = mysqli_query($konek, "update pegawai set password='$new' where username='$user'");
                  if ($query==TRUE) {
                    echo "<script>alert('password berhasil diubah silahkan login :)')</script>";
                    echo "<script>window.location.href='./index.php';</script>";
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
          <div class="modal-footer">

          </div>
        </div>
      </div>
      <br>
      <center><font>Copyright &copy; 2018. <?php $copy = mysqli_query($konek, "select * from config"); $copy1 = mysqli_fetch_array($copy); echo $copy1['copyright'];?></font></center>
  </div>


</body>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script>
</html>
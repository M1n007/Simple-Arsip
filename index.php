<?php
################
#Create by amin#
################
include 'assets/configuration/konek.php';
session_start();
error_reporting(0);
?>

<?php 
$quer2 = mysqli_query($konek, "select * from config");

if (mysqli_num_rows($quer2) > 0) {
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
              if (isset($_POST['login'])) {
                $username = $_POST['userlog'];
                $password = $_POST['passlog'];

                $query = mysqli_query($konek, "select * from pegawai where username='$username' and password='$password'");
                $coba = mysqli_fetch_array($query);
                if ($coba==TRUE) {
                  $_SESSION['username'] = $username;
                  $_SESSION['level'] = $coba['level'];
                  $_SESSION['no_peg'] = $coba['no_peg'];
                  header("Location: manage/index.php");
                }else{
                  ?><center><font class="alert alert-danger modal-title">Login gagal, username/password salah.</font></center><br>
                  <?php
                }
              }
             ?>
            <form method="post" action="">
              <div class="form-group">
                <label>Username :</label>
                <input type="text" class="form-control" name="userlog" placeholder="masukan username..." />
              </div>
              <div class="form-group">
                <label>Password :</label>
                <input type="password" class="form-control" name="passlog" placeholder="masukan Password..." />
              </div>
          </div>
          <div class="modal-footer">
            <button class="btn btn-success" name="login">Log-In</button>
            <a href="lupa.php" class="btn btn-danger">Lupa Password ?</a>
            </form>
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
  <?php
}else{
  echo "<script>window.location.href='regis.php';</script>";
}

 ?>
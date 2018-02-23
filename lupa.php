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
              if (isset($_POST['login'])) {
                $username = $_POST['userlog'];
              
                $query = mysqli_query($konek, "select * from pegawai where username='$username'");
                $coba = mysqli_fetch_array($query);
                if ($coba==TRUE) {
                  $_SESSION['username'] = $username;
                  header("Location: reset.php");
                }else{
                  ?><center><font class="alert alert-danger modal-title">Username tidak terdaftar.</font></center><br>
                  <?php
                }
              }
             ?>
            <form action="" method="post">
              <label>Masukan Username :</label>
                <input class="form-control" type="text" name="userlog" /><br>
                <input type="submit" name="login" class="btn btn-danger" value="cek">
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
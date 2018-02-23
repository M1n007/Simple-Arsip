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
              if (isset($_POST['quest'])) {
                $username = $_SESSION['username'];
                $answer = $_POST['userlog'];
                $query = mysqli_query($konek, "select * from pegawai where username='$username' and pertanyaan='$answer'");
                $coba = mysqli_fetch_array($query);
                if ($coba==TRUE) {
                  echo "<script>alert('sukses silahkan reset password dan login kembali')</script>";
                  header("Location: reset1.php");
                }else{
                  echo "<script>alert('jawaban tidak tepat!!')</script>";
                }
              }
             ?>
            <form action="" method="post">
              <label>Dimana anda tinggal ?</label>
                <input class="form-control" type="text" name="userlog" /><br>
                <input type="submit" name="quest" class="btn btn-danger" value="cek">
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
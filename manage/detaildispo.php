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
    <title>Detail Disposisi</title>
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
                                    <h3 class="box-title">Detail Disposisi</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                <a href="disposisi.php"><font style="font-size:30px;" class="fa fa-hand-o-left btn btn-default">Kembali</font></a>
                                <hr>
                                    <?php
									if (isset($_GET['detaildispo'])) {
										$kd= $_GET['detaildispo'];
										$tampilkan = mysqli_query($konek, "select * from surat_masuk where no_sumas='$kd'");
						                $fak = mysqli_fetch_array($tampilkan);
						                
						               }
						            ?>
            						<embed src="upload_sumas/<?php echo $fak['10']; ?>" width="100%" height="500px" />
            						<br>
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
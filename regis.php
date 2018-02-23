<?php
################
#Create by amin#
################
include 'assets/configuration/konek.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Configuration</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body>
<?php
if (isset($_POST['regis'])) {
	$nopeg = $_POST['nopegregis'];
	$user = $_POST['userregis'];
	$pass = $_POST['passregis'];
	$level = $_POST['levelregis'];
	$copy = $_POST['copyregis'];

	$query2 = mysqli_query($konek, "insert into config(no_peg, username, password, level, copyright)values('$nopeg', '$user', '$pass', '$level', '$copy')");

	if ($query2==TRUE) {
		echo "<script>alert('membuat user&password sukses!! Silahkan Klik OK dan Login untuk menambah data pegawai :)')</script>";
		echo "<script>window.location.href='logadm.php';</script>";
	}else{
		echo "<script>alert('failed create data!!!')</script>";
	}
}
?>
	<div class="container">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<font>Konfigurasi App<b>Mu</b> Sekarang!!</font>
				</div>
				<div class="modal-body">
					<form action="" method="post">
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
						<label>No Pegawai :</label>
						<input class="form-control" type="text" name="nopegregis" value="<?php echo $newLa ?>" readonly>
						<label>Masukan Username :</label>
						<input class="form-control" type="text" name="userregis">
						<label>Masukan password :</label>
						<input class="form-control" type="password" name="passregis">
						<label>level :</label>
						<input class="form-control" type="text" value="admin" name="levelregis" readonly>
						<label>Copyright :</label>
						<input class="form-control" type="text" name="copyregis" placeholder="masukan copyright untuk mengganti copyright pada form login">
						<img src="img/copyright.PNG" width="500px">
				</div>
				<div class="modal-footer">
					<button class="btn btn-success" name="regis">Regis</button>
					</form>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
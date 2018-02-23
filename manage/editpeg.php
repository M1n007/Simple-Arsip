<?php
session_start();
if (empty($_SESSION['username'])) {
  header("Location: ../index.php");
}
?>
<?php require_once('../tpl/header.php'); ?>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <aside class="container-fluid">
        <!-- Main content -->
          <section class="content">

            <?php
              if (isset($_GET['edit'])) {
                $user1 = $_GET['nopeg'];
                $namapeg1 = $_GET['namapeg'];
                $jabpeg1 = $_GET['jabpeg'];
                $alamatpeg1 = $_GET['alamatpeg'];
                $telppeg1 = $_GET['telppeg'];
                $kelaminpeg1 = $_GET['kelaminpeg'];
                $levelpeg1 = $_GET['levelpeg'];
                $userpeg1 = $_GET['userpeg'];
                $passpeg1 = $_GET['passpeg'];

                $perintah3 = mysqli_query($konek, "update pegawai set nama_peg='$namapeg1', jabatan='$jabpeg1', alamat='$alamatpeg1', no_telp='$telppeg1', jns_kelamin='$kelaminpeg1', level='$levelpeg1', username='$userpeg1', password='$passpeg1' where no_peg='$user1'");

                if ($perintah3==TRUE) {
                  ?><font class="alert alert-success">Berhasil Merubah Data!!</font>
                  <?php
                }else{
                  ?>
                  <font class="alert alert-danger">Gagal Merubah Data!!</font>
                  <?php
                }
              }

             ?>
            <center><font><b>Details Data Pegawai</b></font></center>
                <form action="" method="get">
                <?php
                  if (isset($_GET['details'])) {
                    $no_peg= $_GET['details'];
                    $tampil = $konek->query("select * from pegawai where no_peg='$no_peg'");
                    $tam = $tampil->fetch_array(MYSQLI_BOTH);
                  }
                ?>
                    <div class="form-group">
                      <label>No. Peg :</label>
                      <input class="form-control" type="text" name="nopeg" value="<?php if (isset($_GET['details'])) { echo $tam['1']; }?>"  readonly/>
                      <label>Nama :</label>
                      <input class="form-control" type="text" name="namapeg" value="<?php if (isset($_GET['details'])) { echo $tam['2']; }?>"  />
                      <label>Jabatan :</label>
                      <input class="form-control" type="text" name="jabpeg" value="<?php if (isset($_GET['details'])) { echo $tam['3']; }?>" />
                      <label>Alamat :</label>
                      <input class="form-control" type="text" name="alamatpeg" value="<?php if (isset($_GET['details'])) { echo $tam['4']; }?>"/>
                      <label>Telp :</label>
                      <input class="form-control" type="number" name="telppeg" value="<?php if (isset($_GET['details'])) { echo $tam['5']; }?>"/>
                      <label>Kelamin :</label>
                      <input class="form-control" type="text" name="kelaminpeg" value="<?php if (isset($_GET['details'])) { echo $tam['6']; }?>"/>
                      <label>Level :</label>
                      <select class="form-control" name="levelpeg">
                        <option class="form-control" name="levelpeg">
                          admin
                        </option>
                        <option class="form-control" name="levelpeg">
                          user
                        </option>
                      <select>
                      <label>Username :</label>
                      <input class="form-control" type="text" name="userpeg" value="<?php if (isset($_GET['details'])) { echo $tam['8']; }?>"/>
                      <label>Password :</label>
                      <input class="form-control" type="text" name="passpeg" value="<?php if (isset($_GET['details'])) { echo $tam['9']; }?>"/>
                    </div>
                    <div class="modal-footer">
                      <a href="pegawai.php" class="btn btn-primary">Kembali</a>
                      <button class="btn btn-primary" name="edit">Edit</button>
                    </form>
                </div>
          </section><!-- /.content -->
    </aside>
</div><!-- ./wrapper -->

<?php require_once('../tpl/footer.php'); ?>

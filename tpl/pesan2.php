<?php
  if (isset($_POST['add'])) {
    $kd_sukel= $_POST['kd_sukel'];
    $no_sukel = $_POST['no_sukel'];
    $tanggal_sukel = $_POST['tgl_sukel'];
    $instansi_sukel = $_POST['instansi'];
    $judul_sukel = $_POST['judul_sukel'];
    $isi_sukel = $_POST['isi_sukel'];
    //untuk file
    $extensi_sukel = array('png', 'jpg', 'pdf', 'xlsx');
    $nama1 = $_FILES['file_sukel']['name'];
    $x1 = explode('.', $nama1);
    $extensisuk = strtolower(end($x1));
    $ukuran1 = $_FILES['file_sukel']['size'];
    $lokasi1 = $_FILES['file_sukel']['tmp_name'];

    if (in_array($extensisuk, $extensi_sukel) == true ) {
      if ($ukuran1 < 1044070) {
        move_uploaded_file($lokasi1, 'upload_sukel/' .$nama1);
        $kirim3 = "insert into surat_keluar(kd_sukel, no_sukel, tgl_sukel, instansi, judul_sukel, isi_sukel, file_sukel) values('$kd_sukel', '$no_sukel', '$tanggal_sukel', '$instansi_sukel', '$judul_sukel', '$isi_sukel', '$nama1')";
        $kirim2 = $konek->query($kirim3);

        if ($kirim2) {
          echo "<script>alert('surat keluar berhasil di tambah!!')</script>";
          echo "<script>window.location.href='surat-keluar.php';</script>";
        }else{
          echo "<script>alert('surat keluar gagal ditambah!!')</script>";
        }
      }else{
        echo "<script>alert('Ukuran file terlalu besar!')</script>";
      }
    }else{
      echo "<script>alert('type file tidak diperbolehkan!')</script>";
    }

  }


 ?>
<!-- tampilan popup kirim surat -->
<div id="myLose" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <center><font><b>Masukan Data Surat Keluar</b></font></center>
      </div>
      <div class="modal-body">
        <form method="POST" action="" enctype="multipart/form-data">
          <?php
          //kode otomatis
          $what = $konek->query("select max(kd_sukel) as maxKd_sukel from surat_keluar");
          $data  = mysqli_fetch_array($what);
          $noSur = $data['maxKd_sukel'];

          $noUrut = (int) substr($noSur, 6, 6);
          $noUrut++;

          $char = "SUKEL";
          $newKD_SUKEL = $char . sprintf("%03s", $noUrut);
           ?>
          <div class="form-group">
            <label>Kode Surat :</label>
            <input class="form-control" type="text" name="kd_sukel" value="<?php echo $newKD_SUKEL; ?>" readonly/>
            <label>No Surat :</label>
            <input class="form-control" type="text" name="no_sukel" value=""/>
            <label>Tanggal :</label>
            <input class="form-control" type="text" id="tanggal1" name="tgl_sukel" value=""/>
            <label>Nama Instansi :</label>
            <input class="form-control" type="text" name="instansi" placeholder="nama lembaga/tujuan surat"/>
            <label>Subject :</label>
            <input class="form-control" type="text" name="judul_sukel" placeholder="masukan subject"/>
            <label>Keterangan :</label>
            <textarea class="form-control" type="text" name="isi_sukel" placeholder="masukan keterangan surat(jika ada)"></textarea>
            <label>Pilih File :</label>
            <input type="file" name="file_sukel" />
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" name="add">tambah</button>
      </form>
      </div>
    </div>
  </div>
</div>

<?php
  if (isset($_POST['sukel'])) {
    $kd_sukel = $_POST['kdsukel'];
    $no_sukel = $_POST['nosukel'];
    $ins_sukel = $_POST['instansisukel'];
    $tgl_sukel = $_POST['tglsukel'];
    $judul_sukel = $_POST['judulsukel'];
    $isi_sukel = $_POST['isisukel'];

    //untuk file
    $extensi_file_sukel = array('png', 'jpg', 'pdf', 'xlsx');
    $nama_sukel = $_FILES['filesukel']['name'];
    $x3 = explode('.', $nama_sukel);
    $extensisukel = strtolower(end($x3));
    $ukuran_sukel = $_FILES['filesukel']['size'];
    $lokasi_sukel = $_FILES['filesukel']['tmp_name'];
   
    if (in_array($extensisukel, $extensi_file_sukel) == true) {
       if ($ukuran_sukel < 1044070) {
         move_uploaded_file($lokasi_sukel, 'upload_sukel/' . $nama_sukel);
         $kirim_sukel = "insert into surat_keluar(kd_sukel, no_sukel, tgl_sukel, instansi, judul_sukel, isi_sukel, file_sukel)values('$kd_sukel', '$no_sukel', '$tgl_sukel', '$ins_sukel', '$judul_sukel', '$isi_sukel', '$nama_sukel')";
         $kirim_sukel1 = $konek->query($kirim_sukel);

        if ($kirim_sukel1) {
          echo "<script>alert('surat keluar berhasil di tambah!!')</script>";
          echo "<script>window.location.href='surat-keluar.php';</script>";

        }else{
          echo "<script>alert('surat keluar gagal ditambah!!')</script>";
        }
      }else{
        echo "<script>alert('Ukuran file terlalu besar!')</script>";
      }
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
          $que6 = $konek->query("select max(kd_sukel) as maxKd from surat_keluar");
          $data6  = mysqli_fetch_array($que6);
          $noSur6 = $data6['maxKd'];

          $noUrut6 = (int) substr($noSur6, 6, 6);
          $noUrut6++;

          $char6 = "SUKEL";
          $newKD3 = $char6 . sprintf("%03s", $noUrut6);
           ?>
          <div class="form-group">
            <label>Kode Surat :</label>
            <input class="form-control" type="text" name="kdsukel" value="<?php echo $newKD3 ?>" readonly/>
            <label>No Surat :</label>
            <input class="form-control" type="text" name="nosukel" value=""/>
            <label>Nama Instansi :</label>
            <input class="form-control" type="text" name="instansisukel" placeholder="masukan nama pengirim/lembaga yang dituju"/>
            <label>Tanggal Surat :</label>
            <input class="form-control" type="text" id="tanggal4" name="tglsukel"  placeholder="tanggal pada surat"/>
            <label>Subject :</label>
            <input class="form-control" type="text" name="judulsukel" placeholder="masukan subject"/>
            <label>Keterangan :</label>
            <textarea class="form-control" type="text" name="isisukel" placeholder="masukan keterangan surat ( jika ada )"></textarea>
            <label>Pilih File :</label>
            <input type="file" name="filesukel" />
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" name="sukel">Tambah</button>
      </form>
      </div>
    </div>
  </div>
</div>
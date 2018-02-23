<?php
  if (isset($_POST['sumas'])) {
    $kd_sumas= $_POST['kdsur'];
    $no_sumas = $_POST['nosur'];
    $tgl_sumas = $_POST['tglsur'];
    $jenis_sumas = $_POST['jnssur'];
    $judul_sumas = $_POST['judul'];
    $isi_sumas = $_POST['isi'];
    $ins_sumas = $_POST['instansi'];
    $tgldtg_sumas = $_POST['tglsurdtg'];
    $penerima_sumas = $_POST['penerima'];

    //untuk file
    $extensi_file_sumas = array('png', 'jpg', 'pdf', 'xlsx', 'jpeg');
    $nama_sumas = $_FILES['filesumas']['name'];
    $x9 = explode('.', $nama_sumas);
    $extensisumas = strtolower(end($x9));
    $ukuran9 = $_FILES['filesumas']['size'];
    $lokasi_sumas = $_FILES['filesumas']['tmp_name'];

    if (in_array($extensisumas, $extensi_file_sumas) == true) {
      if ($ukuran9 < 1044070) {
        move_uploaded_file($lokasi_sumas, 'upload_sumas/' .$nama_sumas);
        $kirim = "insert into surat_masuk(kd_sumas, no_sumas, tgl_sumas, tgl_sumasdtg, jns_sumas, judul, isi, instansi, penerima, file_sumas)values('$kd_sumas', '$no_sumas', '$tgl_sumas', '$tgldtg_sumas', '$jenis_sumas', '$judul_sumas', '$isi_sumas', '$ins_sumas', '$penerima_sumas', '$nama_sumas')";
        $kirim1 = $konek->query($kirim);

        if ($kirim1) {
          echo "<script>alert('surat masuk berhasil di tambah!!')</script>";
          echo "<script>window.location.href='surat-masuk.php';</script>";

        }else{
          echo "<script>alert('surat masuk gagal ditambah!!')</script>";
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
<div id="myMod" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <center><font><b>Masukan Data Surat Masuk</b></font></center>
      </div>
      <div class="modal-body">
        <form method="POST" action="" enctype="multipart/form-data">
          <?php
          //kode otomatis
          $que5 = $konek->query("select max(kd_sumas) as maxKd from surat_masuk");
          $data5  = mysqli_fetch_array($que5);
          $noSur5 = $data5['maxKd'];

          $noUrut5 = (int) substr($noSur5, 6, 6);
          $noUrut5++;

          $char5 = "SUMAS";
          $newKD = $char5 . sprintf("%03s", $noUrut5);
           ?>
          <div class="form-group">
            <label>Kode Surat :</label>
            <input class="form-control" type="text" name="kdsur" value="<?php echo $newKD; ?>" readonly/>
            <label>No Surat :</label>
            <input class="form-control" type="text" name="nosur" value=""/>
            <label>Nama Instansi/pengirim :</label>
            <input class="form-control" type="text" name="instansi" placeholder="masukan nama pengirim/lembaga"/>
            <label>Ditujukan kepada :</label>
            <select class="form-control" name="penerima">
              <?php
                $peg = mysqli_query($konek, "select * from pegawai");
                while ($peg1 = mysqli_fetch_array($peg)) {

               ?>
              <option><?php echo $peg1['no_peg'];?></option>
              <?php
                }
               ?>
            </select>
            <label>Tanggal Surat :</label>
            <input class="form-control" type="text" id="tanggal" name="tglsur" placeholder="tanggal pada surat"/>
            <label>Tanggal Diterima :</label>
            <input class="form-control" type="text" id="tanggal3" name="tglsurdtg" placeholder="tanggal surat  diterima"/>
            <label>Jenis Surat:</label>
            <input class="form-control" type="text" name="jnssur" value=""/>
            <label>Subject :</label>
            <input class="form-control" type="text" name="judul" placeholder="masukan subject"/>
            <label>Keterangan :</label>
            <textarea class="form-control" type="text" name="isi" placeholder="masukan keterangan surat ( jika ada )"></textarea>
            <label>Pilih File :</label>
            <input type="file" name="filesumas" />
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" name="sumas">Tambah</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php
  if (isset($_POST['tambah'])) {
    $kd_surat= $_POST['kdsur'];
    $no_surat = $_POST['nosur'];
    $tanggal = $_POST['tglsur'];
    $jenis = $_POST['jnssur'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $instansi = $_POST['instansi'];
    $tanggaldtg = $_POST['tglsurdtg'];
    $penerima = $_POST['penerima'];
    //untuk file
    $extensi_file = array('png', 'jpg', 'pdf', 'xlsx');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $extensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $lokasi = $_FILES['file']['tmp_name'];

    if (in_array($extensi, $extensi_file) == true ) {
      if ($ukuran < 1044070) {
        move_uploaded_file($lokasi, 'upload/' .$nama);
        $kirim = "insert into surat_masuk(kd_surat, no_surat, tgl_surat, jns_surat, judul, isi, file, instansi, tgl_suratdtg, penerima) values('$kd_surat', '$no_surat', '$tanggal', '$jenis', '$judul', '$isi', '$nama', '$instansi', '$tanggaldtg', '$penerima')";
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
          $que = $konek->query("select max(kd_surat) as maxKd from surat_masuk");
          $data  = mysqli_fetch_array($que);
          $noSur = $data['maxKd'];

          $noUrut = (int) substr($noSur, 6, 6);
          $noUrut++;

          $char = "SURAT";
          $newKD = $char . sprintf("%03s", $noUrut);
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
            <input class="form-control" type="date" id="tanggal" name="tglsur" placeholder="tanggal pada surat"/>
            <label>Tanggal Diterima :</label>
            <input class="form-control" type="date" id="tanggal3" name="tglsurdtg" placeholder="tanggal surat  diterima"/>
            <label>Jenis Surat:</label>
            <input class="form-control" type="text" name="jnssur" value=""/>
            <label>Subject :</label>
            <input class="form-control" type="text" name="judul" placeholder="masukan subject"/>
            <label>Keterangan :</label>
            <textarea class="form-control" type="text" name="isi" placeholder="masukan keterangan surat ( jika ada )"></textarea>
            <label>Pilih File :</label>
            <input type="file" name="file" />
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" name="tambah">Send</button>
      </form>
      </div>
    </div>
  </div>
</div>

<?php
          if (isset($_POST['dispo'])) {
            $no_dispo = $_POST['nodispo'];
            $no_surat = $_POST['pisur'];
            $tanggal = $_POST['tgl_dispo'];
            $kepada = $_POST['peg'];
            $judul = $_POST['judul_dispo'];
            $catatan = $_POST['catatan_dispo'];
            $pengirim = $_POST['pengirim'];

            $disposisi = mysqli_query($konek,
              "insert into disposisi(no_disposisi, no_sumas, tgl_dispo, penerima, judul, catatan, pengirim) values('$no_dispo', '$no_surat', '$tanggal', '$kepada', '$judul', '$catatan', '$pengirim')"
            );

            if ($disposisi) {
              echo "<script>alert('Disposisi berhasil!')</script>";
              echo "<script>window.location.href='disposisi.php'</script>";
            }else{
              echo "<script>alert('Disposisi gagal!')</script>";
            }

          }
         ?>
        <!-- tampilan popup kirim surat -->
        <div id="myDispo" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <center><font><b>Disposisikan Surat</b></font></center>
              </div>
              <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data">
                  <div class="form-group">
                    <?php
                    //kode otomatis
                    $dispo = $konek->query("select max(no_disposisi) as maxDis from disposisi");
                    $datadis  = mysqli_fetch_array($dispo);
                    $noSur4 = $datadis['maxDis'];

                    $noUrut4 = (int) substr($noSur4, 6, 6);
                    $noUrut4++;

                    $char4 = "DISPO";
                    $newDISPO = $char4 . sprintf("%03s", $noUrut4);
                     ?>
                    <label>No Disposisi :</label>
                    <input class="form-control" type="text" name="nodispo" value="<?php echo $newDISPO; ?>" readonly/>
                    <label>Pilih No Surat :</label>
                    <select class="form-control" name="pisur">
                      <?php
                        $dispo = mysqli_query($konek, "select * from surat_masuk");
                        while ($dispo1 = mysqli_fetch_array($dispo)) {

                       ?>
                      <option><?php echo $dispo1['2'];?></option>
                      <?php
                        }
                       ?>
                    </select>
                    <label>Tanggal Disposisi :</label>
                    <input class="form-control" type="text" id="tanggal1" name="tgl_dispo" value=""/>
                    <label>Pengirim Disposisi :</label>
                    <input class="form-control" type="text" name="pengirim" value="<?php echo $_SESSION['no_peg']; ?>" readonly/>
                    <label>Disposisikan Kepada :</label>
                    <select class="form-control" name="peg">
                      <?php
                        $peg = mysqli_query($konek, "select * from pegawai");
                        while ($peg1 = mysqli_fetch_array($peg)) {

                       ?>
                      <option><?php echo $peg1['no_peg'];?></option>
                      <?php
                        }
                       ?>
                    </select>
                    <label>Subject :</label>
                    <input class="form-control" type="text" name="judul_dispo" placeholder="masukan subject"/>
                    <label>Catatan :</label>
                    <textarea class="form-control" type="text" name="catatan_dispo" placeholder="masukan catatan disposisi"></textarea>
                  </div>
              </div>
              <div class="modal-footer">
                <button class="btn btn-primary" data-dismiss="modal">Batal</button>
                <button class="btn btn-danger" name="dispo">Disposisikan</button>
              </form>
              </div>
            </div>
          </div>
        </div>
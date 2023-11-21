
        <!-- buku -->
        <div class="mb-3 row ps-3 pe-3">
          <label class="col-sm-1 col-form-label ms-3">judul</label>
          <div class="col-sm-10">
              <input class="form-control border-dark" name="judul" required type="text" value="<?php echo $judul_input; ?>" >
            </div>
        </div>

        <!-- penulis -->
        <div class=" mb-3 row ps-3 pe-3" >
          <label class="col-sm-1 col-form-label ms-3">penulis</label>
          <div class="col-sm-10">
              <input class="form-control border-dark" name="penulis" required type="text" value="<?php echo $penulis_input; ?>">
          </div>
         </div>

        <!--tahun -->
        <div class="mb-3 row ps-3 pe-3">
          <label class="col-sm-1 col-form-label ms-3">tahun</label>
          <div class="col-sm-10">
              <input class="form-control border-dark" name="tahun" required type="number" value ="<?php echo $tahun_input; ?>">
          </div>
        </div>

        <!-- button -->
        <div class="mb-3 row ps-3 pe-3">
            <div class="col">

            <?php if (isset($_GET['ubah_buku'])){ ?>
            <button class="btn btn-primary me-1" type="submit" name="submit" value ="Simpan_buku">
            <i class="fa-solid fa-floppy-disk"></i>
              Simpan
            </button>

            <?php }else{ ?>

            <button class="btn btn-primary me-1" type="submit" name="submit" value ="Tambah_buku">
            <i class="fa fa-plus" aria-hidden="true"></i>
              Simpan
            </button>

            <?php } ?>
             
             <input  class="btn btn-danger" type="button" onclick="location.href='buku.php';" value="Batal"/>
            </div>
        </div>
        

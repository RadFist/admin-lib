 <!-- nama -->
 <div class="mb-3 row ps-3 pe-3">
          <label class="col-sm-1 col-form-label ms-3">Nama</label>
          <div class="col-sm-10">
              <input class="form-control border-dark" name="nama" required type="text" value="<?php echo $name_input; ?>" >
          </div>
        </div>

        <!-- alamat -->
        <div class="mb-3 row ps-3 pe-3">
          <label class="col-sm-1 col-form-label ms-3">Alamat</label>
          <div class="col-sm-10">
              <input class="form-control border-dark" name="alamat" required type="text" value="<?php echo $alamat_input; ?>">
          </div>
        </div>

        <!--no tel -->
        <div class="mb-3 row ps-3 pe-3">
          <label class="col-sm-1 col-form-label ms-3">no telephon</label>
          <div class="col-sm-10">
              <input class="form-control border-dark" name="notel" required type="text" pattern="[0-9]+" value ="<?php echo $notel_input; ?>">
          </div>
        </div>

        <div class="mb-3 row ps-3 pe-3">
            <div class="col">
            <?php  if(isset($_GET['ubah_anggota'])){ ?>    
            <button class="btn btn-primary me-1" type="submit" name="submit" value ="Simpan_anggota">
            <i class="fa-solid fa-floppy-disk"></i>
              Simpan
            </button>
        
        <?php }else{ ?>    
        <button class="btn btn-primary me-1" type="submit" name="submit" value ="tambah_anggota">
            <i class="fa fa-plus" aria-hidden="true"></i>
              Simpan
            </button>
        
        <?php } ?>    

        <input  class="btn btn-danger" type="button" onclick="location.href='anggota.php';" value="Batal"/>
            </div>
        </div>

       

      <!-- username -->
      <div class="mb-3 row ps-3 pe-3">
            <label class="col-sm-1 col-form-label ms-3">Username</label>
            <div class="col-sm-10">
            <input class="form-control border-dark" name="username" required type="text"  value ="<?php echo $username; ?>">
            </div>
        </div>

        <!-- password-->
        <div class="mb-2 row ps-3 pe-3">
            <label class="col-sm-1 col-form-label ms-3">Password</label>
            <div class="col-sm-10">
            <input class="form-control border-dark" name="password" required type="password"  value ="<?php echo $notel_input; ?>">
            </div>
        </div>

        <!-- jabatan -->
        <div class="mb-2 row ps-3 pe-3">
            <label class="col-sm-1 col-form-label ms-3">jabatan</label>
            <div class="col-sm-10">
            <select class="form-select border-dark" name="jabatan">
            <option value="">-- Pilih --</option>
            <?php if(isset($_GET['ubah_pengguna'])){?>
              <option value="1"<?php echo ($tampil['jabatan'] == 1 ? 'selected' : ''); ?>>pustakawan</option>
              <option value="2"<?php echo ($tampil['jabatan'] == 2 ? 'selected' : ''); ?>>arsiparis</option>
              <option value="3"<?php echo ($tampil['jabatan'] == 3 ? 'selected' : ''); ?>>admin</option>
            
            <?php }elseif(isset($_GET['tambah_pengguna'])){?>
              <option value="1">pustakawan</option>
              <option value="2">arsiparis</option>
              <option value="3">admin</option>
            <?php }?>
            </select>
            </div>
        </div>


        <!-- status -->
        <div class="mb-2 row ps-3 pe-3">
            <label class="col-sm-1 col-form-label ms-3">status</label>
            <div class="col-sm-10">
            <select class="form-select border-dark" name="status">
            <option value="">-- Pilih --</option>
              
            <?php if(isset($_GET['ubah_pengguna'])){?>
              <option value="1" <?php echo ($tampil['status'] == 1 ? 'selected' : ''); ?>>aktif</option>
              <option value="2" <?php echo ($tampil['status'] == 2 ? 'selected' : ''); ?>>tidak aktif</option>
          
              <?php }elseif(isset($_GET['tambah_pengguna'])){?>   
                <option value="1">aktif</option>
                <option value="2">tidak aktif</option>
                <?php }elseif(isset($_GET['tambah_pengguna'])){?>
                <?php }?>

            </select>
            </div>
        </div>

        <!-- btn -->
        <div class="mb-3 row ps-3 pe-3">
             <div class="col">
                                
        <?php 
          if(isset($_GET['ubah_pengguna'])){
        ?>    
            <button class="btn btn-primary me-1" type="submit" name="submit" value ="Simpan_pengguna">
            <i class="fa-solid fa-floppy-disk"></i>
              Simpan
            </button>
        
        <?php }else{ ?>
          <button class="btn btn-primary me-1" type="submit" name="submit" value="tambah_pengguna">
          <i class="fa fa-plus"></i>
          Tambahkan
          </button>

        <?php } ?>

        <input  class="btn btn-danger" type="button" onclick="location.href='pengguna.php';" value="Batal"/>
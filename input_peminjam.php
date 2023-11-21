<!-- peminjam -->
<div class="mb-3 row ps-3 pe-3">
            <label class="col-sm-1 col-form-label ms-3">Peminjam</label>
            <div class="col-sm-10">
            <select class="form-select" name="anggota">
                
         <?php if(isset($_GET['ubah_peminjam'])){
         echo "<option  value =$idanggota selected >".$tampil['nama']."</option>";
            } ?>
           
        <?php  $result = mysqli_query($connect,"SELECT * from anggota");
         if(isset($_GET['tambah_peminjam'])){ ?>  
            <option selected value="" >pilih nama peminjam</option>
           <?php } ?>

         <?php 
            while($tampil = mysqli_fetch_assoc($result)){
                echo "<option value =$tampil[id] >{$tampil['Nama']}</option>";
            } ?>

          </select>
            </div>
        </div>

        <!-- buku -->
        <div class="mb-2 row ps-3 pe-3">
            <label class="col-sm-1 col-form-label ms-3">Buku</label>
            <div class="col-sm-10">
            <select class="form-select" name="buku">
                
          <?php if(isset($_GET['ubah_peminjam'])){
              echo "<option  value =$idbuku selected >$buku</option>";
            } ?>
                
            <?php $result = mysqli_query($connect,"SELECT * from book");
            if(isset($_GET['tambah_peminjam'])){?>
            <option selected value="" >pilih buku yang dipinjam</option>
            <?php }?>


         <?php
            while($tampil = mysqli_fetch_assoc($result)){
                echo "<option value =$tampil[id] >{$tampil['judul']}</option>";
            } ?>

          </select>
            </div>
        </div>

        <!-- tanggal -->
        <div class="mb-3 row ps-3 pe-3">
          <label class="col-sm-1 col-form-label ms-3">tanggal</label>
          <div class="col-sm-10">
              <input class="form-control border-dark" name="tanggal" required type="date" value ="<?php echo $tanggal; ?>">
          </div>
        </div>
        
        <!-- btn -->
        <div class="mb-3 row ps-3 pe-3">
             <div class="col">
                                
        <?php 
          if(isset($_GET['ubah_peminjam'])){
        ?>    

            <button class="btn btn-primary me-1" type="submit" name="submit" value ="Simpan_peminjam">
            <i class="fa-solid fa-floppy-disk"></i>
              Simpan
            </button>
        
        <?php }else{ ?>
          <button class="btn btn-primary me-1" type="submit" name="submit" value="tambah_peminjam">
          <i class="fa fa-plus"></i>
          Tambahkan
          </button>

        <?php } ?>

        <input  class="btn btn-danger" type="button" onclick="location.href='peminjam.php';" value="Batal"/>
        
        
      </div>
    </div>
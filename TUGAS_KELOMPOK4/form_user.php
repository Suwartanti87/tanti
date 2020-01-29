<?php

$ar_role = ['Admin', 'Guru', 'Siswa', ''];


//-------------------proses ubah data -----------------------
// tangkap request idedit di url
$idedit = $_REQUEST['idedit'];
$obj2 = new UserModel();
if(!empty($idedit)){
  //modus untuk edit data lama yang ditampilkan diform untuk diedit
  $row = $obj2->view([$idedit]);
}
else{
  //modus entry data baru, form tetap dalam keadaan kosong
  $row = [];
}
?>

<form method="POST" action="controller_User.php">
  <div class="form-group row">
    <label for="fullname" class="col-3 col-form-label">Nama User</label> 
    <div class="col-9">
      <input id="fullname" name="fullname" value="<?= $row['fullname'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>

   <div class="form-group row">
    <label for="username" class="col-3 col-form-label">Username</label> 
    <div class="col-9">
      <input id="username" name="username" value="<?= $row['username'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="password" class="col-3 col-form-label">Password</label> 
    <div class="col-9">
      <input id="password" name="password" value="<?= $row['password'] ?>" type="password" required="required" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="email" class="col-3 col-form-label">Email</label> 
    <div class="col-9">
      <input id="email" name="email" value="<?= $row['email'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="role" class="col-3 col-form-label">Role</label> 
    <div class="col-9">
      <select id="role" name="role" required="required" class="custom-select">
        <option value="">-- Pilih Role --</option>
        <?php
        foreach ($ar_role as $rol) {
            $sel = ($rol == $row['role']) ? "selected" : "";
        
        ?>
        <option value="<?= $rol ?>" <?= $sel ?>><?= $rol ?></option>

      <?php } ?>
      </select>
    </div>
  </div>
 
  <div class="form-group row">
    <label for="foto" class="col-3 col-form-label">Foto</label> 
    <div class="col-9">
      <input id="foto" name="foto" value="<?= $row['foto'] ?>"type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-3 col-9">

      <?php
      if(empty($idedit)){ //modus entry data baru
      ?>
      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Simpan</button>
      <?php 
      } 
      else { 
      ?>
      <button name="proses" value="ubah" type="submit" class="btn btn-warning">Ubah</button>
      <input type="hidden" name="idx" value="<?= $idedit ?>"/>
      <?php } ?>

      <button name="proses" value="batal" type="submit" class="btn btn-info">Batal</button>
    </div>
  </div>
</form>
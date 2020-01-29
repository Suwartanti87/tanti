<?php
//buat array scalar u/ master data gender dan status
$ar_gender=['L','P'];
$ar_status=['Menikah','Belum Menikah','Duda','Janda'];
//buat array associative u/ master data jabatan
$bro = new GolonganModel();
$bro2 = new JabatanModel();
$ar_golongan = $bro->getAll();
$ar_jabatan = $bro2->getAll();

$idedit = $_REQUEST['idedit'];
$obj2 = new StaffModel();
if(!empty($idedit)){
  //modus edit data lama yang ditampilkan di form u/ diedit
  $row = $obj2->view([$idedit]);
}
else{
  //modus entry data baru form tetap dalam keadaan kosong
  $row =[];
}
?>


<form method="POST" action="controllerStaff.php">
  <div class="form-group row">
    <label for="nik" class="col-4 col-form-label">NIK</label> 
    <div class="col-8">
      <input id="nik" name="nik" value="<?= $row['nik'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama</label> 
    <div class="col-8">
      <input id="nama" name="nama" value="<?= $row['nama'] ?>" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="tempat_lahir" class="col-4 col-form-label">Tempat Lahir</label> 
    <div class="col-8">
      <input id="tempat_lahir" name="tempat_lahir" value="<?= $row['tempat_lahir'] ?>" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="tgl_lahir" class="col-4 col-form-label">Tanggal Lahir</label> 
    <div class="col-8">
      <input id="tgl_lahir" name="tgl_lahir" value="<?= $row['tgl_lahir'] ?>"type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Jenis Kelamin</label> 
    <div class="col-8">
      <?php
      $no = 0;
      foreach ($ar_gender as $jenis_kelamin) {
        $cek = ($jenis_kelamin == $row['jenis_kelamin']) ? "checked" : "";
      ?>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="jenis_kelamin" id="jenis_kelamin <?= $no ?>" type="radio" class="custom-control-input" value="<?= $jenis_kelamin ?>" <?= $cek ?>> 
        <label for="jenis_kelamin <?= $no ?>" class="custom-control-label"><?= $jenis_kelamin ?></label>
      </div>
      <?php $no++; } ?>
    </div>
  </div>

  
   <div class="form-group row">
    <label for="golongan_id" class="col-4 col-form-label">Golongan</label> 
    <div class="col-8">
      <select id="golongan_id" name="golongan_id" required="required" class="custom-select">
        <option value="">-- Pilih Golongan --</option>
         <?php 
        foreach ($ar_golongan as $gol) {
          $sel = ($gol['id'] == $row['golongan_id']) ? "selected" : "";
        ?>
        <option value="<?= $gol['id'] ?>" <?= $sel ?>> <?= $gol['nama'] ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="jab" class="col-4 col-form-label">Jabatan</label> 
    <div class="col-8">
      <select id="jabatan_id" name="jabatan_id" required="required" class="custom-select">
        <option value="">-- Pilih Jabatan --</option>
         <?php 
        foreach ($ar_jabatan as $jab) {
          $sel = ($jab['id'] == $row['jabatan_id']) ? "selected" : "";
        ?>
        <option value="<?= $jab['id'] ?>" <?= $sel ?>> <?= $jab['nama'] ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="alamat" class="col-4 col-form-label">Alamat</label> 
    <div class="col-8">
      <textarea id="alamat" name="alamat" cols="40" rows="4" aria-describedby="alamatHelpBlock" required="required" class="form-control"><?= $row['alamat'] ?></textarea> 
      <span id="alamatHelpBlock" class="form-text text-muted">Isi Alamat Lengkap Anda</span>
    </div>
  </div>
  <div class="form-group row">
    <label for="no_hp" class="col-4 col-form-label">HP</label> 
    <div class="col-8">
      <input id="no_hp" name="no_hp" value="<?= $row['no_hp'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input id="email" name="email" value="<?= $row['email'] ?>" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Status Pernikahan</label> 
    <div class="col-8">
      <?php
      $i = 0;
      foreach ($ar_status as $status) {
        $cek2 = ($status == $row['status_pernikahan']) ? "checked" : "";
      ?>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="status_pernikahan" id="status_pernikahan_<?= $i ?>" type="radio" class="custom-control-input" value="<?= $status ?>" <?= $cek2 ?>> 
        <label for="status_pernikahan_<?= $i ?>" class="custom-control-label"><?= $status ?></label>
      </div>
      <?php $i++; } ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="jumlah_anak" class="col-4 col-form-label">Jumlah Anak</label> 
    <div class="col-8">
      <input id="jumlah_anak" name="jumlah_anak" type="text" class="form-control"value="<?= $row['jumlah_anak'] ?>">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="pendidikan" class="col-4 col-form-label">Pendidikan</label> 
    <div class="col-8">
      <input id="pendidikan" name="pendidikan" value="<?= $row['pendidikan'] ?>" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="foto" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="foto" name="foto" type="text" class="form-control" value="<?= $row['foto'] ?>">
    </div>
  </div>

  
  
  <div class="form-group row">
    <div class="offset-4 col-8">
       <?php 
      if(empty($idedit)){
        ?>
      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Simpan</button>
      <?php
      }
      else {
        //modus edit data lama
      
      ?>
        <button name="proses" value="ubah" type="submit" class="btn btn-warning">Ubah</button>
        <input type="hidden" name="idx" value="<?= $idedit ?>"/>
      <?php } ?>

      <button name="proses" value="batal" type="submit" class="btn btn-info">Batal</button>
    </div>
  </div>
</form>

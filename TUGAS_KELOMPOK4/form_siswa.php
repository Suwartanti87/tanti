<?php
//buat array scalar u/ master data gender dan status
$ar_gender=['L','P'];
$ar_agama=['Islam','Katolik','Protestan','Hindu','Buddha','Konghucu'];
//buat array associative u/ master data jabatan
$bro = new KelasModel();
$ar_siswa = $bro->getAll();

$idedit = $_REQUEST['idedit'];
$obj2 = new SiswaModel();
if(!empty($idedit)){
  //modus edit data lama yang ditampilkan di form u/ diedit
  $row = $obj2->view([$idedit]);
}
else{
  //modus entry data baru form tetap dalam keadaan kosong
  $row =[];
}
?>


<form method="POST" action="controllerSiswa.php">
  <div class="form-group row">
    <label for="nis" class="col-4 col-form-label">NIS</label> 
    <div class="col-8">
      <input id="nis" name="nis" value="<?= $row['nis'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="nisn" class="col-4 col-form-label">NISN</label> 
    <div class="col-8">
      <input id="nisn" name="nisn" value="<?= $row['nisn'] ?>"type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-4 col-form-label">Nama</label> 
    <div class="col-8">
      <input id="nama" name="nama" value="<?= $row['nama'] ?>" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-4">Jenis Kelamin</label> 
    <div class="col-8">
      <?php
      $no = 0;
      foreach ($ar_gender as $jk) {
        $cek = ($jk == $row['jenis_kelamin']) ? "checked" : "";
      ?>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="jk" id="jk_<?= $no ?>" type="radio" class="custom-control-input" value="<?= $jk ?>" <?= $cek ?>> 
        <label for="jk_<?= $no ?>" class="custom-control-label"><?= $jk ?></label>
      </div>
      <?php $no++; } ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="tempat_lahir" class="col-4 col-form-label">Tempat Lahir</label> 
    <div class="col-8">
      <input id="tempat_lahir" name="tempat_lahir" value="<?= $row['tempat_lahir'] ?>" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="tanggal_lahir" class="col-4 col-form-label">Tanggal Lahir</label> 
    <div class="col-8">
      <input id="tanggal_lahir" name="tanggal_lahir" value="<?= $row['tgl_lahir'] ?>"type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="agama" class="col-4 col-form-label">Agama</label> 
    <div class="col-8">
      <select id="agama" name="agama" class="custom-select" required="required">
        <option value="">--Pilih Agama--</option>
        <?php 
        foreach ($ar_agama as $ag) {
          $sele = ($ag == $row['agama']) ? "selected" : "";
        ?>
        <option value="<?= $ag ?>"<?= $sele ?>><?= $ag ?> </option>
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
    <label for="wali_murid" class="col-4 col-form-label">Wali Murid</label> 
    <div class="col-8">
      <input id="wali_murid" name="wali_murid" value="<?= $row['wali'] ?>" type="text" class="form-control" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="hp" class="col-4 col-form-label">HP</label> 
    <div class="col-8">
      <input id="hp" name="hp" value="<?= $row['no_hp'] ?>" type="text" required="required" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="kelas" class="col-4 col-form-label">Kelas</label> 
    <div class="col-8">
      <select id="jabatan" name="jabatan" required="required" class="custom-select">
        <option value="">-- Pilih Kelas --</option>
         <?php 
        foreach ($ar_siswa as $bro) {
          $sel = ($bro['id'] == $row['kelas_idkelas']) ? "selected" : "";
        ?>
        <option value="<?= $bro['id'] ?>" <?= $sel ?>> <?= $bro['nama'] ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="foto" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="foto" name="foto" value="<?= $row['foto'] ?>" type="text" class="form-control">
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

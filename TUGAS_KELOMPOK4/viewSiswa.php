<?php
//tangkap request di url dari klik tombol detail
$id = $_GET['idsis'];
$model = new SiswaModel();
$rs = $model->view([$id]);

// print_r($rs); exit;
// foreach ($rs as $sis) {
// 	$nama = $id->nama;


?>

<div class="card" style="width: 18rem;">
  <img src="images/<?= $rs['foto'] ?>" class="card-img-top" alt="..." >
  <div class="card-body">
    <h5 class="card-title"><?= $rs['nama'] ?></h5>
    <p class="card-text">
    	NIS : <?= $rs['nis'] ?>
    	<br/>NISN : <?= $rs['nisn'] ?>
    	<br/>Jenis Kelamin : <?= $rs['jenis_kelamin'] ?>
    	<br/>Tempat Lahir : <?= $rs['tempat_lahir'] ?>
    	<br/>Tanggal Lahir : <?= $rs['tgl_lahir'] ?>
    	<br/>Agama : <?= $rs['agama'] ?>
    	<br/>Alamat : <?= $rs['alamat'] ?>
    	<br/>Wali Murid : <?= $rs['wali'] ?>
    	<br/>No Hp : <?= $rs['no_hp'] ?>
    	<br/>Kelas : <?= $rs['jrs'] ?>
    </p>
    <a href="index.php?fat=siswa" class="btn btn-primary">kembali</a>
  </div>
</div>


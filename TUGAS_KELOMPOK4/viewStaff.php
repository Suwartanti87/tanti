<?php
//tangkap request di url dari klik tombol detail
$id = $_GET['idst'];
$model = new StaffModel();
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
    	NIK : <?= $rs['nik'] ?>
        <br/>Tempat Lahir : <?= $rs['tempat_lahir'] ?>
        <br/>Tanggal Lahir : <?= $rs['tgl_lahir'] ?>
    	<br/>Jenis Kelamin : <?= $rs['jenis_kelamin'] ?>
    	<br/>Golongan : <?= $rs['nama_golongan'] ?>
        <br/>Jabatan : <?= $rs['nama_jabatan'] ?>
        <br/>Alamat : <?= $rs['alamat'] ?>
    	<br/>No Hp : <?= $rs['no_hp'] ?>
    	<br/>Email : <?= $rs['email'] ?>
        <br/>Status Pernikahan : <?= $rs['status_pernikahan'] ?>
        <br/>Jumlah Anak : <?= $rs['jumlah_anak'] ?>
        <br/>Pendidikan : <?= $rs['pendidikan'] ?>
    </p>
    <a href="index.php?fat=staff" class="btn btn-primary">kembali</a>
  </div>
</div>


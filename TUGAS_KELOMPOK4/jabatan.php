<?php
$sesi = $_SESSION['MEMBER'];
if(isset($sesi) && $sesi['role'] != 'staff'){



$ar_judul = ['No','Nama','',''];
//ciptakan pbj dari class pegawaimodel
$model =  new JabatanModel();
$rs = $model->getAll();

?>



<h3>Daftar Jabatan</h3>

<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  Tambah +
</button>
<br/>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Jabatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include 'form_jabatan.php' ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"> Tutup </button>
      </div>
    </div>
  </div>
</div>
<br/>




<table class="table table-hover table-dark">
  <thead>
    <tr>
    <?php

    foreach ($ar_judul as $jdl) {
    	?>
      <th scope="col"><?= $jdl ?></th>
  	<?php } ?>

     </tr>
  </thead>
  <tbody>
    
    	<?php
    	$no= 1;
    	foreach($rs as $jab){
    	  ?>
	<tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $jab['nama']?></td>
  <td align="right">  
        <a class="btn btn-warning btn-small" href="
        index.php?fat=form_jabatan&idedit= <?= $jab['id']?>">Ubah</a>
        </td>
        <td align="left">
        <form method="POST" action="controllerJabatan.php">
        <button class="btn btn-danger btn-small" name="proses"
        value="hapus" onclick="return confirm('Anda Ingin  Menghapus Data Ini ????')">Hapus</button>
        <input type="hidden" name="idx" value="<?= $jab['id'] ?>" />
        </form>
      </td>
    </tr>
	<?php $no++; }  ?>
  </tbody>
</table>

<?php 

} // TUTUP if(isset($...)){
else{
  include_once 'terlarang.php';
}

?>
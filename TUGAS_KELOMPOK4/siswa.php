<?php 
$sesi = $_SESSION['MEMBER'];
if(isset($sesi) && $sesi['role'] != 'siswa'){

$ar_judul = ['No','NIS', 'NISN', 'Nama', 'Jenis Kelamin','Kelas', ''];


$model = new SiswaModel();


$keyword = $_REQUEST['keyword']; 
$idkel = $_REQUEST['idkel'];

if(!empty($keyword)){
$rs = $model->cari($keyword);
}
else if(!empty($idkel)) {
  //filter
  $rs = $model->filter([$idkel]);
}
else{
  $rs = $model->getAll();
}


?>





<h3> Daftar Siswa</h3>


  <!-- ------Awal modal -------->
  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
 Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_siswa.php' ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
  <!-- Ahir modal----->
  <br/>
  <br/>


<table class="table table-striped">
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
    <tr>
    	<?php
    	$no = 1;
    foreach ($rs as $sis) {

    ?>
      <th scope="row"><?= $no ?></th>
      <td><?= $sis['nis'] ?></td>
      <td><?= $sis['nisn'] ?></td>
      <td><?= $sis['nama'] ?></td>
      <td><?= $sis['jenis_kelamin'] ?></td>
       <td><?= $sis['jrs'] ?></td>
        <td align="right">
        <a class="btn btn-primary btn-sm" href="index.php?fat=viewSiswa&idsis=<?= $sis['id'] ?>">detail</a>
        &nbsp;&nbsp;&nbsp;
        <a class="btn btn-warning btn-sm" href="index.php?fat=form_siswa&idedit=<?= $sis['id'] ?>">ubah</a>
      </td>
      <td align="left">
        <form method="POST" action="controllerSiswa.php">

        <button class="btn btn-danger btn-sm" name="proses" value="hapus" 
        onclick="return confirm('Anda Yakin ???')">hapus</button>
        <input type="hidden" name="idx" value="<?= $sis['id'] ?>"/>
      </form>
      </td>
    </tr>
    <?php 
    $no++;
  } ?>   
  </tbody>
</table>

<?php
} //tutup if(isset(....)){
else{
  include_once 'terlarang.php';
} 
?>



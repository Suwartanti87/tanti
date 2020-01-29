<?php 
$sesi = $_SESSION['MEMBER'];
if(isset($sesi)){

$ar_judul = ['No','NIK', 'Nama', 'Jenis Kelamin','Alamat','Golongan','Jabatan', ''];


$model = new StaffModel();

$keyword = $_REQUEST['keyword']; 

if(!empty($keyword)){
$rs = $model->cari($keyword);
}
else{
  $rs = $model->getAll();
}

?>


<h3> Daftar Staff</h3>


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
        <h5 class="modal-title" id="exampleModalLabel">Form Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_staff.php' ?>
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
    foreach ($rs as $st) {

    ?>
      <th scope="row"><?= $no ?></th>
      <td><?= $st['nik'] ?></td>
      <td><?= $st['nama'] ?></td>
      <td><?= $st['jenis_kelamin'] ?></td>
       <td><?= $st['alamat'] ?></td>
        <td><?= $st['nama_golongan'] ?></td>
         <td><?= $st['nama_jabatan'] ?></td>
       
        <td align="right">
        <a class="btn btn-primary btn-sm" href="index.php?fat=viewStaff&idst=<?= $st['id'] ?>">detail</a>
        &nbsp;&nbsp;&nbsp;
        <a class="btn btn-warning btn-sm" href="index.php?fat=form_staff&idedit=<?= $st['id'] ?>">ubah</a>
      </td>
      <td align="left">
        <form method="POST" action="controllerStaff.php">

        <button class="btn btn-danger btn-sm" name="proses" value="hapus" 
        onclick="return confirm('Anda Yakin ???')">hapus</button>
        <input type="hidden" name="idx" value="<?= $st['id'] ?>"/>
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



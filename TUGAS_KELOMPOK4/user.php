<?php
$sesi = $_SESSION['MEMBER'];
if(isset($sesi) && $sesi['role'] != 'siswa' ){

$ar_judul = ['No','Fullname','Username','Email', 'Role','', ''];
//ciptakan objek dari class UserModel

$model = new UserModel();

$rs = $model->getAll();
?>

<h3> Daftar User</h3>
<br/>

<!-- ----------------------awal modal ----------------->

<!-- Button trigger modal -->
<button type="button" class="btn-secondary btn-sm" data-toggle="modal" data-target="#exampleModal">
  Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_user.php' ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        
      </div>
    </div>
  </div>
</div>

<!-- ----------------------akhir modal ----------------->

<br/><br/>

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
    foreach ($rs as $us) {

    ?>
      <th scope="row"><?= $no ?></th>
      <td><?= $us['fullname'] ?></td>
      <td><?= $us['username'] ?></td>
      <td><?= $us['email'] ?></td>
      <td><?= $us['role'] ?></td>
      <td align="right">
      	<a class="btn btn-primary btn-sm" href="index.php?fat=viewUser&idus=<?= $us['id'] ?>">Show</a> &nbsp;&nbsp;&nbsp;&nbsp;
      	<a class="btn btn-warning btn-sm" href="index.php?fat=form_user&idedit=<?= $us['id'] ?>">Change</a>
      </td>
      <td>
        <form method="POST" action="controller_User.php">
      	<button class="btn btn-danger btn-sm" name="proses" value="hapus" 
      	onclick="return confirm('Sudah Yakin Kah?')">Delete</button>
        <input type="hidden" name="idx" value="<?= $us['id'] ?>"/></form>
      </td>

    </tr>
     <?php $no++; } ?>
   
  </tbody>
</table>



<?php 
} else {
  include_once 'terlarang.php';
}
?> 


<?php
$sesi = $_SESSION['MEMBER'];
if(isset($sesi) && $sesi['role'] != 'siswa'){

$ar_judul =['No','Nama','Guru','Tingkat','Jurusan','Jumlah Murid','',''];
//ciptakan objek dari class JabatanModel
$model = new KelasModel();
$rs = $model->getAll();

?>

	<h3>Data Kelas</h3>

  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
 Tambah
</button>
<br/>
<br/>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include_once 'form_kelas.php' ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<table class="table">
  <thead class="thead-dark">
    <tr>
    	<?php
    	foreach($ar_judul as $jdl) {

    	?>
      <th scope="col"><?= $jdl ?></th>
      
      <?php } ?>
    </tr>
  </thead>
  <tbody>
  	<?php
  	$no = 1;
  	foreach ($rs as $kel) {
  	
  	?>
    <tr>
      <th scope="row"><?= $no ?></th>
      <td><?= $kel['nama'] ?></td>
       <td><?= $kel['guru'] ?></td>
        <td><?= $kel['tingkat'] ?></td>
         <td><?= $kel['jurusan'] ?></td>
          <td><?= $kel['jumlah_murid'] ?></td>
     
      <td align="right">
       
        <a class="btn btn-warning btn-sm" href="index.php?fat=form_kelas&idedit=<?= $kel['id'] ?>">ubah</a>
      </td>
      <td align="left">
        <form method="POST" action="controllerKelas.php">

        <button class="btn btn-danger btn-sm" name="proses" value="hapus" 
        onclick="return confirm('Yakinkah?')">hapus</button>
        <input type="hidden" name="idx" value="<?= $kel['id'] ?>"/>
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
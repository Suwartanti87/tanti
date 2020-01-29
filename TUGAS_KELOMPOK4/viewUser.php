<?php
//tangkap request di url dari klik tombol detail
$id = $_GET['idus'];
$model = new UserModel();
$rs = $model->view([$id]);
?>







<div class="card" style="width: 18rem;">
  <img src="images/<?= $rs['foto'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h4 class="card-title"><?= $rs['fullname'] ?></h4>
    <p class="card-text">
    	<br/>Role : <?= $rs['role'] ?>
    	
    </p>
    <a href="index.php?fat=user" class="btn btn-primary">Kembali</a>
  </div>
</div>


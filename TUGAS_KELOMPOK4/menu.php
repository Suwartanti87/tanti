<?php
$sesi = $_SESSION['MEMBER'];
?>

<div class="row">
		<div class="col-md-12 fixed-top">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
				 
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="navbar-toggler-icon"></span>
				</button> <a class="navbar-brand" href="#">Education</a>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="navbar-nav">
						<li class="nav-item active">
							 <a class="nav-link" href="index.php?fat=home">Home<span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							 <a class="nav-link" href="index.php?fat=profile">Profile</a>
						</li>
						
						<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">Info Education</a>

							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
								 <a class="dropdown-item" href="https://belajar.kemdikbud.go.id" target="_blank">Rumah Belajar</a>
								 <a class="dropdown-item" href="http://ruangguru.com" target="_blank">Ruang Guru</a>
								 <a class="dropdown-item" href="http://brainly.co.id" target="_blank">Brainly</a>
								 <a class="dropdown-item" href="http://quipper.com" target="_blank">Quipper</a>
								 <a class="dropdown-item" href="http://zenius.net" target="_blank">Zenius</a>
								
								
						</li>
						
						
					</ul>
					<form class="form-inline">
						<input class="form-control mr-sm-2" type="text" name="keyword"> 
						<button class="btn btn-primary my-2 my-sm-0" type="submit">
							Pencarian
						</button>
						<input type="hidden" name="fat" value="siswa"/>
					</form>
					<ul class="navbar-nav ml-md-auto">
						<?php
						if(!isset($sesi)){
							//-----belum login-------
						?>
						<li class="nav-item">
							 <a class="nav-link" href="index.php?fat=login">Log In</a>
						</li>
						<?php } 
					//---------sudah berhasil login-------
						else{
					?>
					<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
							 	<img src="images/<?= $sesi['foto'] ?>" width="20%">&nbsp;
							 	<?= $sesi['fullname'] ?>
							 </a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
								 <a class="dropdown-item" href="#">Profile</a> 
								 <?php
								 if($sesi['role'] == 'admin'){
								 ?>
								 <a class="dropdown-item" href="index.php?fat=user">Kelola User</a> 
								<?php } ?>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout.php">Logout</a>
							</div>
						</li>

						
						<?php } ?>
					</ul>
				</div>
			</nav>
		</div>
	</div>
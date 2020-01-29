<div class="col-md-9">
<?php

//tangkap request di url (dari klik menu)	

$fat = $_GET['fat'];

if(!empty($fat)){
	//arahkan sesuai halaman request
	include_once $fat.'.php';

}else{

	//arahkan ke halaman home.php
	include_once 'home.php';
}
?>


		</div>
	</div>
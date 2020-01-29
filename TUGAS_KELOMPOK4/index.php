<?php 
session_start();

include_once 'database.php';
include_once 'SiswaModel.php';
include_once 'KelasModel.php';
include_once 'LoginModel.php';
include_once 'GuruModel.php';
include_once 'GolonganModel.php';
include_once 'UserModel.php';
include_once 'JabatanModel.php';
include_once 'StaffModel.php';

include_once 'menu.php';
include_once 'header.php';

echo '<br/>';
include_once 'sidebar.php';
include_once 'main.php';
echo '<br/>';
include_once 'footer.php';



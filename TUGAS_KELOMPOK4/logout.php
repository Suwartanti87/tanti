<?php
session_start();
//session_destroy(); ini untuk menghapus semua secara membabi buta
unset($_SESSION['MEMBER']); //untuk menghapus sesion
header('location:index.php?fat=home');
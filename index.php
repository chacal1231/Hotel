<?php
date_default_timezone_set('America/Bogota');
session_start();
$Flag="ACTIVADPS";
if (empty($_SESSION['Nombre'])){
    header("Location: login.php");
}
$pagina = isset($_GET['view']) ? strtolower($_GET['view']) : 'home';
if(isset($_GET['view'])){
	if(!file_exists('pages/'.$_GET['view'].'.php')){
    header("Location: ?view=404");
  }else{
		include 'pages/header.php';
		include 'pages/' . $_GET['view'] . '.php';
		include 'pages/footer.php';
	}
}
else{
		include 'pages/header.php';
		include('pages/home.php');
		include 'pages/footer.php';
}
?>

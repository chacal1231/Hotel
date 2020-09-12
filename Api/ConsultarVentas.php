<?php
include '../inc/conn.php';
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
/*Consulto la información de ventass*/
if(isset($_POST['FechaInicio'])){
	$FechaInicio = $link->real_escape_string($_POST['FechaInicio']);
	$FechaFin = $link->real_escape_string($_POST['FechaFin']);
	$QueryVentas = $link->query("SELECT SUM(TotalVenta) AS Total FROM ventas WHERE DATE(FechaVenta) BETWEEN '".$FechaInicio."' AND '".$FechaFin."'");
	if($QueryVentas->num_rows>0){
		echo json_encode(array('Ventas'=>number_format($QueryVentas->fetch_array()['Total'])));
	}else{
		echo json_encode(array('Ventas'=>0));
	}
}
<?php
include '../inc/conn.php';
include '../inc/API.php';
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
if(isset($_POST['Data'])){
	$Data = $_POST['Data'];
	/*Actualizo el estado de la habitación*/
	$link->query("UPDATE habitaciones SET Estado='Disponible' WHERE Nombre='".$Data['NombreHabitacion']."'");
	/*Actualizo el estado de la reserva*/
	$link->query("UPDATE reservas SET Estado='Disponible',FechaSalida='".date('Y-m-d H:i:s')."' WHERE Id='".$Data['Id']."'");
	/*Actualizo el estado del PIN*/
	$link->query("UPDATE pines SET Estado='Inactivo' WHERE IdReserva='".$Data['Id']."'");
	/*Query para obtener nombre del pin*/
	$Pin = $link->query("SELECT * FROM pines WHERE IdReserva='".$Data['Id']."'")->fetch_array()['Pin'];
	/*Elimino los pines de la mikrotik*/
	$QueryCredencialesRouterOS = mysqli_query($link,"SELECT * FROM mikrotik") or die(mysqli_error());
	$RowCROS = mysqli_fetch_assoc($QueryCredencialesRouterOS);
	$API = new RouterosAPI();
	$API->debug = false;
	$API->connect($RowCROS['Ip'], $RowCROS['Usuario'], $RowCROS['Pass'], $RowCROS['Puerto']);
	$ConsultaIpBinding = $API->comm("/ip/hotspot/ip-binding/print" , array (
		"?comment" => $Pin
	));
	/*Recorro el arreglo*/
	foreach ($ConsultaIpBinding as $value) {
		/*Elimino a los autorizados*/
		$API->write("/ip/hotspot/ip-binding/remove", false);
		$API->write("=.id=".$value['.id']);
		$API->read();
	}
	echo json_encode(array('Estado'=>'OK'));
}
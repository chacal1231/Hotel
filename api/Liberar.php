<?php
include '../inc/conn.php';
include '../inc/API.php';
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
if(isset($_POST['Data'])){
	$Data = $_POST['Data'];
	$FechaSalida = date('Y-m-d H:i:s');
	/*Actualizo el estado de la habitación*/
	$link->query("UPDATE habitaciones SET Estado='Disponible' WHERE Nombre='".$Data['NombreHabitacion']."'");
	/*Actualizo el estado de la reserva*/
	$link->query("UPDATE reservas SET Estado='Disponible',FechaSalida='".$FechaSalida."' WHERE Id='".$Data['Id']."'");
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
	/*Ventas*/
	/*Query FechaEntrada*/
	$FechaEntrada = $link->query("SELECT FechaEntrada FROM reservas WHERE Id='".$Data['Id']."'")->fetch_array()['FechaEntrada'];
	$Dias = ceil((strtotime($FechaEntrada)-strtotime($FechaSalida)) / (60 * 60 * 24));
	if($Dias==0){
		$Dias = 1;
	}else{
		$Dias = $Dias;
	}
	/*Precio*/
	$Precio = $link->query("SELECT Precio FROM habitaciones WHERE Nombre='".$Data['NombreHabitacion']."'")->fetch_array()['Precio'];
	$TotalVenta = ($Precio * $Dias);
	/*Inserto en ventas*/
	$link->query("INSERT INTO ventas(Reserva,Dias,TotalVenta,FechaVenta) VALUES('".$Data['Id']."','".$Dias."','".$TotalVenta."','".date('Y-m-d H:i:s')."')");
	echo json_encode(array('Estado'=>'OK'));
}
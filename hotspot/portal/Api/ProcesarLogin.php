<?php
date_default_timezone_set('America/Bogota');
include '../../../inc/conn.php';
include 'API.php';
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
/*Cargo la API Mikrotik*/
$QueryCredencialesRouterOS = mysqli_query($link,"SELECT * FROM mikrotik") or die(mysqli_error());
$RowCROS = mysqli_fetch_assoc($QueryCredencialesRouterOS);
$API = new RouterosAPI();
$API->debug = false;
$API->connect($RowCROS['Ip'], $RowCROS['Usuario'], $RowCROS['Pass'], $RowCROS['Puerto']);
/*Verifico el post*/
if(isset($_POST['Pin'])){
	$Pin = $link->real_escape_string($_POST['Pin']);
	$Mac = $link->real_escape_string($_POST['Mac']);
	/*Verifico Si el pin Existe*/
	$QueryVerificarPin = $link->query("SELECT * FROM pines WHERE Pin='".$Pin."'");
	if($QueryVerificarPin->num_rows>0){
		/*Verifico si está habilitado*/
		$RowQueryVerificarPin = $QueryVerificarPin->fetch_array();
		if($RowQueryVerificarPin['Estado']=="Activo"){
			/*Verifico el número de conectados*/
			if($RowQueryVerificarPin['Conectados']<$RowQueryVerificarPin['Usuarios']){
				/*Actualizo el número de conectados*/
				$link->query("UPDATE pines SET Conectados='".($RowQueryVerificarPin['Conectados']+1)."' WHERE Pin='".$Pin."'");
				/*Hago la query en la API*/
				$IP_BIN = $API->comm("/ip/hotspot/ip-binding/add", array(
					"mac-address"        	=> $Mac,
					"server"   				=> "all",
					"type"          		=> "bypassed",
					"comment"     			=> $Pin
				));
				/*Respondo OK*/
				echo json_encode(array("Estado"=>"OK"));
			}else{
				echo json_encode(array("Estado"=>"Error","Error"=>"¡Excedió el número de usuarios permitidos para el Pin!"));
			}

		}else{
			echo json_encode(array("Estado"=>"Error","Error"=>"¡El pin no está habilitado!"));
		}
	}else{
		echo json_encode(array("Estado"=>"Error","Error"=>"¡El pin no existe!"));
	}
}
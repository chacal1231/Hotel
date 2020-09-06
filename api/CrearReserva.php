<?php
include '../inc/conn.php';
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
if(isset($_POST['NombreHabitacion'])){
	/*Recolecto los datos*/
	$NombreHabitacion = $link->real_escape_string($_POST['NombreHabitacion']);
	/*Hago el update*/
	$link->query("UPDATE habitaciones SET Estado='Ocupada' WHERE Nombre='".$NombreHabitacion."'");
	/*Query numero de usuarios*/
	$NumeroCamas=$link->query("SELECT * FROM habitaciones WHERE Nombre='".$NombreHabitacion."'")->fetch_array()['Camas'];
	/*Inserto en reservas*/
	$QueryInsert = $link->query("INSERT INTO reservas(NombreHabitacion,Estado,FechaEntrada,FechaSalida) VALUES ('".$NombreHabitacion."','Ocupada','".date('Y-m-d H:i:s')."','0000-00-00 00:00:00')");
	/*Creo el pin para la navegación*/
	$Pin = "HOTEL-".rand(0,1000);
	/*Inserto query a pines*/
	$link->query("INSERT INTO pines(Pin,IdReserva,Usuarios,Conectados,Estado,FechaCreacion) VALUES('".$Pin."','".$link->insert_id."','".$NumeroCamas."',0,'Activo','".date('Y-m-d H:i:s')."')");
	
	/*Verifico si hay error*/
	if($link->error){
		echo json_encode(array('Estado'=>'Error','Error'=>$link->error));
	}else{
		echo json_encode(array('Estado'=>'OK','Pin'=>$Pin,'NumeroCamas'=>$NumeroCamas));
	}
}

 <?php
include '../inc/conn.php';
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
if(isset($_POST['NombreHabitacion'])){
	/*Recolecto los datos*/
	$NombreHabitacion = $link->real_escape_string($_POST['NombreHabitacion']);
	$TipoHabitacion = $link->real_escape_string($_POST['TipoHabitacion']);
	$CamasHabitacion = $link->real_escape_string($_POST['CamasHabitacion']);
	/*Hago el insert*/
	$link->query("INSERT INTO habitaciones(Nombre,Tipo,Camas,Estado,FechaCreacion) VALUES('".$NombreHabitacion."','".$TipoHabitacion."','".$CamasHabitacion."','Disponible','".date('Y-m-d H:i:s')."')");
	/*Verifico si hay error*/
	if($link->error){
		echo json_encode(array('Estado'=>'Error','Error'=>$link->error));
	}else{
		echo json_encode(array('Estado'=>'OK'));
	}
}

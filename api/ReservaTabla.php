<?php
include '../inc/conn.php';
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
/*Consulto la información de la tabla*/
$QueryTabla = $link->query("SELECT * FROM reservas");
$RowTabla = $QueryTabla->fetch_array();
foreach ($QueryTabla as $RowTabla => $value) {
	if($value['Estado'] =="Disponible"){
		$Estado = '<button class="btn btn-sm btn-success" type="button">Disponible</button>'; 
	}else{
		$Estado = '<button class="btn btn-sm btn-danger" type="button">Ocupada</button>'; 
	}
	$Data[] = array('Id'=>$value['Id'],'NombreHabitacion'=>$value['NombreHabitacion'],'Estado'=>$Estado,'FechaEntrada'=>$value['FechaEntrada'],'FechaSalida'=>$value['FechaSalida'],'Acciones'=>'<button class="btn btn-sm btn-success Liberar" type="button">Liberar</button>');
}
/*Devuelvo lo que necesito a DataTables*/
$results = array(
	"sEcho" => 1,
	"iTotalRecords" => count($Data),
	"iTotalDisplayRecords" => count($Data),
	"aaData"=>$Data);
echo json_encode($results);
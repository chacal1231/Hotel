<?php
include '../inc/conn.php';
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
/*Consulto la información de la tabla*/
$QueryTabla = $link->query("SELECT * FROM habitaciones");
$RowTabla = $QueryTabla->fetch_array();
foreach ($QueryTabla as $RowTabla => $value) {
	if($value['Estado'] =="Disponible"){
		$Estado = '<button class="btn btn-sm btn-success" type="button">Disponible</button>'; 
	}else{
		$Estado = '<button class="btn btn-sm btn-danger" type="button">Ocupada</button>'; 
	}
	$Data[] = array('NombreHabitacion'=>$value['Nombre'],'TipoHabitacion'=>$value['Tipo'],'CamasHabitacion'=>$value['Camas'],'Estado'=>$Estado,'FechaCreacion'=>$value['FechaCreacion'],'Acciones'=>'<button class="btn btn-sm btn-success Modificar" type="button">Modificar</button>','Precio'=>$value['Precio']);
}
/*Devuelvo lo que necesito a DataTables*/
$results = array(
	"sEcho" => 1,
	"iTotalRecords" => count($Data),
	"iTotalDisplayRecords" => count($Data),
	"aaData"=>$Data);
echo json_encode($results);
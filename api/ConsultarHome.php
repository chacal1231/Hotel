<?php
include '../inc/conn.php';
include '../inc/API.php';
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
/*Consulto la información de ventass*/
$VentasDia = $link->query("SELECT SUM(TotalVenta) As Total FROM ventas WHERE DATE(FechaVenta)=DATE(NOW())")->fetch_array()['Total'];
$VentasSemanales = $link->query("SELECT SUM(TotalVenta) As Total FROM ventas WHERE WEEK(FechaVenta)=WEEK(NOW())")->fetch_array()['Total'];
$VentasMensuales = $link->query("SELECT SUM(TotalVenta) As Total FROM ventas WHERE MONTH(FechaVenta)=MONTH(NOW())")->fetch_array()['Total'];
echo json_encode(array('Dia'=>number_format($VentasDia),'Semanal'=>number_format($VentasSemanales),'Mensual'=>number_format($VentasMensuales),'Reservas'=>$link->query("SELECT COUNT(*) AS Total FROM reservas")->fetch_array()['Total'],'Pines'=>$link->query("SELECT COUNT(*) AS Total FROM pines")->fetch_array()['Total']));
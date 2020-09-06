<?php
include '../inc/conn.php';
include '../inc/API.php';
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');
echo json_encode(array('Reservas'=>$link->query("SELECT COUNT(*) AS Total FROM reservas")->fetch_array()['Total'],'Pines'=>$link->query("SELECT COUNT(*) AS Total FROM pines")->fetch_array()['Total']));
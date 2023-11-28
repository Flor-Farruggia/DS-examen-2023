<?php

require_once "../../configuracion/database.php";
require_once "../../modelo/producto.php";
require_once "responses/consultarTodosResponse.php";

header('Content-Type: application/json');
$json = file_get_contents('php://input',true);
$req = json_decode($json);

$resp= new ConsultarTodosResponse();

$resp->ListProductos = Producto::BuscarTodas();

$cantProd = 0;

foreach ($resp->ListProductos as $ls) {
    $cantProd = $cantProd + 1;
}

$resp->CantProductos=$cantProd;

echo json_encode($resp);
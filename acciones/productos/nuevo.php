<?php

require_once "../../configuracion/database.php";
require_once "../../modelo/producto.php";
require_once "request/nuevoRequest.php";
require_once "responses/nuevoResponse.php";

header('Content-Type: application/json');
$json = file_get_contents('php://input',true);
$req = json_decode($json);

$prod = new Producto();
$prod->Marca = $req->Marca;
$prod->Descripcion = $req->Descripcion;
$prod->Codigo = $req->Codigo;
$prod-> Agregar();

$resp = new NuevoResponse();
$resp->IsOk=true;


echo json_encode($resp);
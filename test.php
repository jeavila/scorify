<?php

use Scorify\Core\Util as Util;
use Scorify\Core\Modelo as Modelo;
use Scorify\Core\Controlador as Controlador;

require 'vendor/autoload.php';

/*
$modelo = new Scorify\Core\Modelo('alumnos');

$all = $modelo->selectById(1);
var_dump($all);
*/


$controlador = new Controlador();
$controlador->redirigir('alumnos', 'index');
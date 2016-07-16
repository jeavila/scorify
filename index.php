<?php
use Scorify\Core\Core as Core;
use Scorify\Core\Lanzador as Lanzador;
use Scorify\Config\Constante as Constante;
require 'vendor/autoload.php';

Core::crearAmbiente();

if (isset($_GET['controlador']) && isset($_GET['accion'])) {
	$id = $_GET['id'] ?? null;

	Lanzador::invocar($_GET['controlador'], $_GET['accion'], $id);
} else {
	Lanzador::invocar(Constante::CONTROLADOR_DEFAULT, Constante::ACCION_DEFAULT);
}


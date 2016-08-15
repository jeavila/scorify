<?php
use Scorify\Core\Common as Common;
use Scorify\Core\Launcher as Launcher;
use Scorify\Config\Constant as Constant;

require dirname(__DIR__) . '/config/bootstrap.php';

Common::crearAmbiente();

if (isset($_GET['controlador']) && isset($_GET['accion'])) {
	$id = $_GET['id'] ?? null;

	Launcher::invocar($_GET['controlador'], $_GET['accion'], $id);
} else {
	Launcher::invocar(Constant::CONTROLADOR_DEFAULT, Constant::ACCION_DEFAULT);
}

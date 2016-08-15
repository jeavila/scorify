<?php

use Scorify\Core\Util as Util;
use Scorify\Core\Model as Model;
use Scorify\Core\Controller as Controller;

require dirname(__DIR__) . '/config/bootstrap.php';

/*
$model = new Scorify\Core\Model('alumnos');

$all = $modelo->selectById(1);
var_dump($all);
*/


$controller = new Controller();
$controller->redirect('alumnos', 'edit', 1);

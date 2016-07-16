<?php

namespace Scorify\Controlador;

use Scorify\Core\Controlador as Ctrl;
use Scorify\Modelo\Alumnos as AlumnosModelo;

class AlumnosCtrl extends Ctrl 
{
    public function index() 
    {
    	$modelo = new AlumnosModelo();
        $alumnos = $modelo->selectAll();

        $this->set('titulo', 'Lista de Alumnos');
        $this->set('data', $alumnos);
        $this->render('alumnos/index');
    }

    public function create()
    {

    }

    public function delete($id)
    {
    	$alumnos = new AlumnosModelo();
    	$alumnos->deleteById($id);
    }

    public function edit($id)
    {

    }
}

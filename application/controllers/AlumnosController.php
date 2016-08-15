<?php

namespace Scorify\Controller;

use Scorify\Core\Controller as Ctrl;
use Scorify\Helper\Html as Html;
use Scorify\Helper\Form as Form;
use Scorify\Helper\Arrays as Arrays;
use Scorify\Helper\Message as Message;
use Scorify\Model\Alumnos as AlumnosModelo;

class AlumnosController extends Ctrl
{
    private static $message;

    public function index()
    {
      	$modelo = new AlumnosModelo();
        $alumnos = $modelo->selectAll();
        $header = array_keys(Arrays::objectToArray($alumnos[0]));

        $this->set('message', self::$message);
        $this->set('titulo', 'Lista de Alumnos');
        $this->set('html', new Html());
        $this->set('header', $header);
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
        self::$message = null;
        $modelo = new AlumnosModelo();
        $alumno = $modelo->selectById($id);

        //$this->set('html', new Html());
        $this->set('form', new Form());

        if (!isset($alumno)) {
            self::$message = Message::error('No se encontró este alumno');
        } else {
            $this->set('opciones_txt', array('class' => 'form-control'));
            $this->set('opciones_btn', array('class' => 'btn btn-primary'));
            $this->set('alumno', $alumno);
        }

        $this->set('titulo', 'Editar alumnos');
        $this->set('message', self::$message);
        $this->render('alumnos/edit');
    }

    public function save()
    {
        self::$message = null;

        if (count($_POST) > 0) {
            $modelo = new AlumnosModelo();
            $modelo->update($_POST);
            self::$message = Message::success('Cambios guardados');
        } else {
            self::$message = Message::error('Ocurrio un error');
        }

        $this->redirect('alumnos', 'index');
    }
}

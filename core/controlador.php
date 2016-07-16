<?php

namespace Scorify\Core;

use Scorify\Core\Modelo as Modelo;
use Scorify\Config\Constante as Constante;

class Controlador {

    private $variables;

    public function __construct()
    {
        $this->variables = [];
    }

    public function set($nombre, $valor)
    {
        $this->variables[$nombre] = $valor;
    }

    public function render($vista)
    {
        extract($this->variables);

        require_once Constante::getRoot() . Constante::DS . 'plantillas' . Constante::DS . 'header.php';
        require_once Constante::getRoot() . Constante::DS . 'vistas' . Constante::DS . $vista . '.php';
        require_once Constante::getRoot() . Constante::DS . 'plantillas' . Constante::DS . 'footer.php';    
    }

    public function redirigir($controlador, $accion, $id = null) 
    {
        header("Location: index.php?controlador={$controlador}&accion={$accion}&id={$id}");
    }

}

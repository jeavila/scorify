<?php

namespace Scorify\Core;

use Scorify\Core\Model as Model;
use Scorify\Config\Constant as Constant;
use Scorify\Helper\Url as Url;

class Controller {

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

        $directorio = ROOT . DS . 'application' . DS;

        require_once $directorio . 'templates' . DS . Constant::PLANTILLA_HEADER;
        require_once $directorio . 'views'  . DS . $vista . '.php';
        require_once $directorio . 'templates' . DS . Constant::PLANTILLA_FOOTER;
    }

    public function redirect($controlador, $accion, $id = null)
    {
        $url = Url::getUrl($controlador, $accion, $id);
        header("Location: {$url}");
    }

}

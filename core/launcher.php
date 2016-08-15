<?php

namespace Scorify\Core;

use Scorify\Config\Constant as Constant;

class Launcher
{
    public static function cargarControlador($controlador)
    {
        $clase = 'Scorify\\Controller\\' . ucwords($controlador) . 'Controller';

        try {
            $controladorObj = new $clase;
            return $controladorObj;
        } catch (Exception $e) {
            throw new Exception("Error Processing Request", 1);

        }
    }

    public static function cargarAccion($controladorObj, $accion, $id = null)
    {
        $controladorObj->$accion($id);
    }

    public static function invocar($controlador, $accion, $id = null)
    {
        $controladorObj = self::cargarControlador($controlador);

        if (method_exists($controladorObj, $accion)) {
            $_accion = $accion;
        } else {
            $_accion = Constant::ACCION_DEFAULT;
        }

        self::cargarAccion($controladorObj, $_accion, $id);
    }

}

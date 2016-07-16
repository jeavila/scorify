<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Scorify\Core;

use Scorify\Config\Constante as Constante;

class Lanzador 
{
    public static function cargarControlador($controlador) 
    {
        $clase = 'Scorify\\Controlador\\' . ucwords($controlador) . 'Ctrl';

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
            $_accion = Constante::ACCION_DEFAULT;
        }
        
        self::cargarAccion($controladorObj, $_accion, $id);
    }

}

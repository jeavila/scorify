<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Scorify\Core;

use Scorify\Config\Constante as Constante;

class Core 
{
    public static function crearAmbiente()
    {
        switch (Constante::AMBIENTE) {
            case 'desarrollo':
                error_reporting(E_ALL);
                ini_set('display_errors', 1);
                break;
            case 'produccion':
                error_reporting(0);
                ini_set('display_errors', 0);
                break;
        }
    }
}
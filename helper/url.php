<?php

namespace Scorify\Helper;

use Scorify\Config\Constant as Constant;

class Url
{
	public static function getUrl($controlador, $accion, $id = null)
	{
			$url = DS . Constant::APLICACION . DS
					. "?controlador={$controlador}&accion={$accion}";

			if ($id != null) {
					$url .= "&id={$id}";
			}

			return $url;
	}
}

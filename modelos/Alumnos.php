<?php
namespace Scorify\Modelo;

use Scorify\Core\Modelo as Modelo;

class Alumnos extends Modelo
{
	protected $id;
	protected $nombre;
	protected $cuenta;
	protected $email;

	public function __construct()
	{
		parent::__construct('alumnos');
	}
}
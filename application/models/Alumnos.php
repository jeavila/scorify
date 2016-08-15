<?php
namespace Scorify\Model;

use Scorify\Core\Model as Model;

class Alumnos extends Model
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
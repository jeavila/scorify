<?php

if (isset($alumno)) {
	$form->open('alumnos', 'save');
	$form->hidden('id', $alumno->id);
	$form->input('nombre', $alumno->nombre, 'text', $opciones_txt);
	$form->input('cuenta', $alumno->cuenta, 'text', $opciones_txt);
	$form->input('email', $alumno->email, 'email', $opciones_txt);
	$form->submit($opciones_btn);
	$form->close();
} else {
	echo $mensaje;
}

//$html->a('alumnos', 'index', 'Ir al index');

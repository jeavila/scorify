<?php

namespace Scorify\Helper;

use Scorify\Helper\Html as Html;
use Scorify\Helper\Url as Url;

class Form
{
  public function open($controlador, $accion, $method = 'POST', $atributos = array())
  {
      $_action = Url::getUrl($controlador, $accion);
      $_atributos = Html::setAtributes($atributos);

      echo '<form action="' . $_action . '" method="' . $method . '"' 
        . $_atributos . '>' . PHP_EOL;
  }

  public function input($name, $value, $type = 'text', $atributos = array())
  {
      $_atributos = Html::setAtributes($atributos);

      echo '<div class="form-group">' . PHP_EOL;
      echo '<label for="' . $name . '">' . ucfirst($name) . '</label>'
          . PHP_EOL;
      echo '<input type="' . $type . '" name="' . $name . '" id="'
          . $name . '" value="' . $value . '" ' . $_atributos . ' />' . PHP_EOL;
      echo '</div>' . PHP_EOL;
  }

  public function hidden($name, $value)
  {
      echo '<input type="hidden" name="' . $name . '" value="'
          . $value . '" />' . PHP_EOL;
  }

  public function submit($atributos = array())
  {
      $this->input('', 'Enviar', 'submit', $atributos);
  }

  public function close()
  {
      echo '</form>' . PHP_EOL;
  }


}

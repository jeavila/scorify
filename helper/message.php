<?php

namespace Scorify\Helper;

class Message
{
    public static function error($mensaje)
    {
      return '<p class="error-msg">' . $mensaje . '</p>';
    }

    public static function success($mensaje)
    {
      return '<p class="success-msg">' . $mensaje . '</p>';
    }
}


 ?>

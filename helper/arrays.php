<?php

namespace Scorify\Helper;

class Arrays
{
  public static function objectToArray($object)
  {
    return json_decode(json_encode($object), true);
  }
}

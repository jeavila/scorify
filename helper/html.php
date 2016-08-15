<?php

namespace Scorify\Helper;

use Scorify\Helper\Url as Url;
use Scorify\Helper\Arrays as Arrays;

class Html
{
	public static function setAtributes($attributes)
	{
		$strAttributes = null;

		if (empty($attributes)) {
			return $strAttributes;
		}

		if (is_string($attributes)) {
			return ' ' . $attributes;
		}

		$attributes = (array) $attributes;

		foreach ($attributes as $key => $val) {
			$strAttributes .= $key . '="' . $val . '"';
		}

		return rtrim($strAttributes, ',');
	}

	public function table($titles, $data, $attributes)
	{
		$_attr_table = $this->setAtributes($attributes['table']);
		$_attr_th = $this->setAtributes($attributes['th']);
		$_attr_td = $this->setAtributes($attributes['td']);

		echo "<table $_attr_table>";
		echo '<thead>';
		echo '<tr>';

		foreach ($titles as $title) {
			echo '<th ', $_attr_th, '>', $title, '</th>';
		}

		echo '</tr>';
		echo '</thead>';

		foreach ($data as $row) {
			echo '<tr>';

			foreach ($row as $key => $value) {
				echo '<td ', $_attr_td, '>', $value, '</td>';
			}

			echo '</tr>';
		}

		echo '</table>';
	}

	public static function a()
	{
		$argumentos = func_get_args();
        $numArgumentos = func_num_args();

		if ($numArgumentos == 2) {
			echo "<a href='{$argumentos[0]}'>{$argumentos[1]}</a>";
		} else if ($numArgumentos == 3) {
			$url = Url::getUrl($argumentos[0], $argumentos[1], $argumentos[2]);

			echo "<a href='{$url}'</a>";
		}
	}

}

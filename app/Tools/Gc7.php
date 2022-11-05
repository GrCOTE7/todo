<?php

/**
 * (ɔ) Online FORMAPRO - GrCOTE7 -2022.
 */

namespace App\Tools;

class Gc7
{
	public static function aff($var, $txt = null)
	{
		$aff = '<a title=' . debug_backtrace()[0]['file'] . '&nbsp;-&nbsp;Line&nbsp;' . debug_backtrace()[0]['line'] . '><pre>' . (($txt) ? $txt . ' : ' : '');
		$aff .= print_r($var, 1);
		$aff .= '</pre></a>';
		echo $aff;

		return $aff;
	}

	/**
	 * Affiche les 3 clés utiles de notre session.
	 */
	public static function affSession()
	{
		self::aff($_SESSION['data'], 'data');
		self::aff($_SESSION['todo'], 'todo');
		self::aff($_SESSION['errors'], 'errors');
	}
}
// aff(debug_backtrace());

<?php

/**
 * (ɔ) Online FORMAPRO - GrCOTE7 -2022.
 */

namespace App\Tools;

class Gc7
{
	public static function aff($var, $txt = null)
	{
		$aff = self::affR($var, $txt);
		echo $aff;
	}
	
	public static function affR($var, $txt = null){
		$aff = '<a title=' . debug_backtrace()[0]['file'] . '&nbsp;-&nbsp;Line&nbsp;' . debug_backtrace()[0]['line'] . '><pre>' . (($txt) ? $txt . ' : ' : '');
		$aff .= print_r($var, 1);
		$aff .= '</pre></a>';
		// echo $aff;

		return $aff;
	}

	/**
	 * Affiche les 3 clés utiles de notre session.
	 */
	public static function affSession($out=0)
	{
		$infos = ['page', 'todo', 'errors'];
		foreach ($infos as $info) {
			$str[] = self::affR($_SESSION['data'][$info] ?? 'Nothing', $info);
		}
		return implode($str);
	}
}
// aff(debug_backtrace());

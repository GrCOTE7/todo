<?php

namespace App\Tools;

$GLOBALS['ROOT_DOCUMENT'] = realpath($_SERVER['DOCUMENT_ROOT']);

class Gc7
{
	public static function aff(mixed $var, $txt = null): void
	{
		$aff = self::affR($var, $txt);
		echo $aff;
	}

	public static function affR(mixed $var, $txt = null): string
	{
		$aff = '<a title=' . debug_backtrace()[1]['file'] . '&nbsp;-&nbsp;Line&nbsp;' . debug_backtrace()[1]['line'] . '><pre>' . (($txt) ? $txt . ' : ' : '');
		$aff .= print_r($var, 1);
		$aff .= '</pre></a>';
		// echo $aff;

		return $aff;
	}

	/**
	 * Affiche les 3 clés utiles de notre session.
	 *
	 * @param mixed $out
	 */
	public static function affSession($out = 0): string
	{
		$infos = ['page', 'todo', 'errors'];
		foreach ($infos as $info) {
			$str[] = self::affR($_SESSION['data'][$info] ?? 'Nothing', $info);
		}

		return implode($str);
	}
}
// aff(debug_backtrace());

if (!function_exists('getUri')) {
	function getUri(): string
	{
		return explode('?', $_SERVER['REQUEST_URI'])[0];
	}
}

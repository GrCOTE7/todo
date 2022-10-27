<?php

/**
 * (ɔ) Online FORMAPRO - GrCOTE7 -2022.
 */

namespace App\Tools;

class Gc7
{
	public static function aff($var, $txt = null)
	{
		echo '<a title=' . debug_backtrace()[0]['file'] . '&nbsp;-&nbsp;Line&nbsp;' . debug_backtrace()[0]['line'] . '><pre>' . (($txt) ? $txt . ' : ' : '');
		var_dump($var);
		echo '</pre></a>';
	}
}
// aff(debug_backtrace());
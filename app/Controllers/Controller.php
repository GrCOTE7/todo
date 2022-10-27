<?php

/**
 * (ɔ) Online FORMAPRO - GrCOTE7 -2022.
 */

namespace App\Controllers;

use App\Templating\Template;

abstract class Controller
{
	protected Template $template;

	public function __construct()
	{
		$this->template = new Template();
	}
}
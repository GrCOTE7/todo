<?php

/**
 * (ɔ) Online FORMAPRO - GrCOTE7 -2022.
 */

namespace App\Controllers;

class HomeController extends Controller
{
	public function index(): string
	{
		return $this->template->render('pages/index.twig');
	}
}
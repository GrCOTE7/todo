<?php

/**
 * (ɔ) Online FORMAPRO - GrCOTE7 -2022.
 */

namespace App\Controllers;

use App\Models\Todo;
use App\Tools\Gc7;

class TestController extends Controller
{
	public $tasks;

	public function test(): string
	{
		// $td = (new Todo())->getTodo(28);
		// $td->name='okéè2y';
		// $td->save();

		// Gc7::aff($td, 'td');

		return $this->template->render('pages/test.twig', ['data' => $data ?? '']);
	}

	public function allTasksExceptTask2()
	{
		$tasks = $this->tasks;

		unset($tasks[1]);
		// echo '<pre>';
		// var_dump($tasks);
		// echo '</pre>';

		return $tasks;
	}
}

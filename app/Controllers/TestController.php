<?php

/**
 * (ɔ) Online FORMAPRO - GrCOTE7 -2022.
 */

namespace App\Controllers;

use App\Task;

class TestController extends Controller
{
	public $tasks;

	public function test(): string
	{
		$this->tasks       = (new Task())->all();
		$_SESSION['tasks'] = $this->allTasksExceptTask2();

		return $this->template->render('pages/test.twig');
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
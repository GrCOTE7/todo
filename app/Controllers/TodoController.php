<?php

/**
 * (ɔ) Online FORMAPRO - GrCOTE7 -2022.
 */

namespace App\Controllers;

use App\Models\Todo;

class TodoController extends Controller
{
	public function index(): string
	{
		$todoModel = new Todo();
		$todos     = $todoModel->all();

		list($checked_todos, $in_progress_todos) = $this->getTodosByChecked($todos);

		return $this->template->render('pages/index.twig', [
			'checked_todos'     => $checked_todos,
			'in_progress_todos' => $in_progress_todos,
		]);
	}

	private function getTodosByChecked(array $todos): array
	{
		$checked_todos     = [];
		$in_progress_todos = [];
		foreach ($todos as $todo) {
			if ($todo->is_checked) {
				$checked_todos[] = $todo;
			} else {
				$in_progress_todos[] = $todo;
			}
		}

		return [$checked_todos, $in_progress_todos];
	}
}
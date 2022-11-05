<?php

/**
 * (ɔ) Online FORMAPRO - GrCOTE7 -2022.
 */

namespace App\Controllers;

use App\FlashMessage;
use App\Models\Todo;
use App\Tools\Gc7;
use App\Validators\Todo as TodoValidator;

class TodoController extends Controller
{
	public function index(): string
	{
		$todos = (new Todo())->all();
		// $_SESSION['todos'] = $todos;

		Gc7::affSession();

		return $this->template->render('pages/index.twig', ['todos' => $todos]);
	}

	public function form()
	{
		$_SESSION['data'] = [
			'title'  => 'Ajouter une Tâche',
			'action' => 'create',
		];

		// Gc7::aff($_SESSION);

		return $this->template->render('pages/form.twig');
	}

	public function create()
	{
		FlashMessage::getInstance()->clearErrors();

		$todo = [
			'name'    => $_POST['name'] ?? null,
			'content' => $_POST['content'] ?? null,
		];

		TodoValidator::validate($todo);

		$errors = FlashMessage::getInstance()->getErrors();

		// echo 'data<pre>';
		// var_dump([$errors, FlashMessage::getInstance()->hasErrors(), 'nb'=>FlashMessage::getInstance()->getNbErrors()]);
		// echo '</pre>';

		// exit;

		$_SESSION['data'] = [
			'title'  => 'Ajouter une Tâche',
			'action' => 'create',
		];
		$_SESSION['todo']   = $todo;
		$_SESSION['errors'] = $errors;

		if (FlashMessage::getInstance()->hasErrors()) {
			Gc7::affSession();

			return $this->template->render('pages/form.twig');
		}
		(new Todo())->create($todo);
		// return $this->index();

		$todos = (new Todo())->all();

		// Gc7::aff($_SESSION);

		$_SESSION['todos'] = $todos;

		header('Location: /');
		// return $this->template->render('pages/index.twig');
		// return $this->template->render('pages/index.twig');
	}

	public function edit($id)
	{
		$todo = (new Todo())->getTodo($id['id']);

		return $this->template->render('pages/form.twig', [
			'todo'   => $todo,
			'title'  => 'Mettre à jour la tâche',
			'action' => '../update',
			'errors' => [
				'name1'   => $errName1 ?? '',
				'name2'   => $errName2 ?? '',
				'content' => $errContent ?? '',
			],
		]);
	}

	public function update()
	{
		var_dump($_POST);
		$todo['name']    = $name = $_POST['name'];
		$todo['content'] = $content = $_POST['content'] ?? '';
		var_dump($name);

		$validNameStr       = Validator::stringVal()->validate($name);
		$validNameLength    = Validator::length(3, 40)->validate($name);
		$validContentLength = Validator::length(1, 255)->validate($content);

		$errName1 = $errName2 = $errContent = '';
		if (!$validNameStr) {
			$errName1 = 'Nom pas alphanumérique';
		}
		if (!$validNameLength) {
			$errName2 = 'Nom trop court ou trop long';
		}
		if (!$validContentLength) {
			$errContent = 'Contenu Trop court ou trop long';
		}
		// var_dump( Validator::length(3, 40)->validate($name) );

		if ($validNameStr * $validNameLength * $validContentLength) {
			// echo 'oki';
			$newTodo = new Todo();
			// enregistrment dans la Bdd
			var_dump($todo);
			exit;
			$newTodo->update($todo);
			// Retour sur la page index
			header('Location: /');
			// return $this->template->render('pages/index.twig');
		}

		echo 'ERREUR';

		return $this->template->render('pages/form.twig', [
			'todo'   => $todo,
			'title'  => 'Mettre à jour la tâche',
			'action' => '../update',
			'errors' => [
				'name1'   => $errName1 ?? '',
				'name2'   => $errName2 ?? '',
				'content' => $errContent ?? '',
			],
		]);
	}

	public function changeStatus($id)
	{
		$todo = (new Todo())->getTodo($id['id']);
		$todo->is_checked ^= 1;
		$todo->save();

		header('Location: /');
	}

	private function getTodosByChecked(array $todos): array
	{
		$in_progress_todos = [];
		$checked_todos     = [];
		foreach ($todos as $todo) {
			if ($todo->is_checked) {
				$checked_todos[] = $todo;
			} else {
				$in_progress_todos[] = $todo;
			}
		}

		return [$in_progress_todos, $checked_todos];
	}
}

<?php

namespace App\Controllers;

use App\FlashMessage;
use App\Models\Todo;
use App\Tools\Gc7;
use App\Validators\Todo as TodoValidator;

class TodoController extends Controller
{
	// private const $FORM = 'pages/index.twig';
	public const HOME = '/';
	public const FORM = 'pages/form.twig';

	public function index(): string
	{
		$_SESSION['HOST'] = $_SERVER['HTTP_HOST'];

		// Gc7::aff($_SERVER);

		echo '<hr>';

		$todos = (new Todo())->all();

		return $this->template->render('pages/index.twig', ['todos' => $todos]);
	}

	public function form()
	{
		$data['page'] = [
			'title'  => 'Ajouter une Tâche',
			'action' => 'create',
		];

		return $this->template->render(self::FORM, ['data' => $data]);
	}

	public function create()
	{
		FlashMessage::getInstance()->clearErrors();

		$page = [
			'title'  => 'Ajouter une Tâche',
			'action' => 'create',
		];

		$todo = [
			'name'    => $_POST['name'] ?? null,
			'content' => $_POST['content'] ?? null,
		];

		TodoValidator::validate($todo);

		$errors = FlashMessage::getInstance()->getErrors();

		$data = [
			'page'   => $page,
			'todo'   => $todo,
			'errors' => $errors,
		];

		if (FlashMessage::getInstance()->hasErrors()) {
			return $this->template->render(self::FORM, ['data' => $data]);
		}

		(new Todo())->create($todo);

		$todos = (new Todo())->all();

		$_SESSION['todos'] = $todos;

		header('location: ' . self::HOME);
	}

	public function edit($id)
	{
		$todo = (new Todo())->getTodo($id['id']);

		// Gc7::aff($_SERVER);
		echo $todo->name . '<hr>';

		$data = [
			'page' => [
				'title'  => 'Mettre à jour la tâche',
				'action' => '../update',
			],
			'todo' => [
				'name'    => $todo->name,
				'content' => $todo->content,
			],
		];

		return $this->template->render(self::FORM, ['data' => $data]);
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

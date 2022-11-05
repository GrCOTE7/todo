<?php

namespace App\Controllers;

use App\Tools\Gc7;
use App\Models\Todo;
use App\FlashMessage;
use App\Validators\Todo as TodoValidator;

class TodoController extends Controller
{
	public const FORM = 'pages/form.twig';

	public function index(): string
	{
		$todos = (new Todo())->all();

		return $this->template->render('pages/index.twig', ['todos' => $todos]);
	}

	public function form()
	{
		return $this->getForm();
	}

	public function edit($id)
	{
		$todo         = (new Todo())->getTodo($id['id']);
		$todo->action = 'update';

		return $this->getForm($todo);
	}

	public function save()
	{
		FlashMessage::getInstance()->clearErrors();

		$todo = [
			'action'  => $_POST['action'] ?? null,
			'id'      => $_POST['id'] ?? null,
			'name'    => $_POST['name'] ?? null,
			'content' => $_POST['content'] ?? null,
		];

		TodoValidator::validate($todo);

		$errors = FlashMessage::getInstance()->getErrors();

		$data = [
			'todo'   => $todo,
			'errors' => $errors,
		];

		if (FlashMessage::getInstance()->hasErrors()) {
			return $this->template->render(self::FORM, ['data' => $data]);
		}

		if ('create' == $todo['action']) {
			(new Todo())->create($todo);
		} else {
			$modifiedTodo          = (new Todo())->getTodo($todo['id']);
			$modifiedTodo->name    = $todo['name'];
			$modifiedTodo->content = $todo['content'];
			$modifiedTodo->save();
		}
		header('location: /');
	}

	public function changeStatus($id)
	{
		$todo = (new Todo())->getTodo($id['id']);
		$todo->is_checked ^= 1;
		$todo->save();

		header('Location: /');
	}

	public function delete($id)
	{
		Gc7::aff($id['id']);
		$toDeleteTodo = (new Todo())->getTodo($id['id']);
		$toDeleteTodo->delete();
		header('location: /');
	}

	private function getForm($todo = null)
	{
		$data['todo'] = [
			'action'  => $todo['action'] ?? 'create',
			'id'      => $todo['id'] ?? null,
			'name'    => $todo['name'] ?? null,
			'content' => $todo['content'] ?? null,
		];

		return $this->template->render(self::FORM, ['data' => $data]);
	}
}

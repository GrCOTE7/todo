<?php

namespace App\Models;

class Todo extends Model
{
	protected static string $table = 'todos';

	public function all(): \IdiormResultSet|array
	{
		return \ORM::forTable(self::$table)->orderByDesc('id')->findMany();
	}

	public function getTodo($id)
	{
		return \ORM::forTable(self::$table)->findOne($id);
	}

	public function create($newTodo)
	{
		// echo '<hr>';
		// var_dump($newTodo);
		// echo '<hr>';
		
		$todo          = \ORM::forTable(self::$table)->create();
		$todo->name    = $newTodo['name'];
		$todo->content = $newTodo['content'];

		var_dump($todo->name);

		return $todo->save();
	}
	
	public function update($updatedTodo){
		// echo '<hr>';
		// var_dump($updatedTodo['id']);
		// echo '<hr>';
		// exit;
		$todo          = \ORM::forTable(self::$table)->findOne($updatedTodo['id']);
		$todo->name    = $updatedTodo['name'];
		$todo->content = $updatedTodo['content'];

		// var_dump($todo->name);

		return $todo->save();
	}
}
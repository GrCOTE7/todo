<?php

namespace App\Models;

use IdiormResultSet;
use ORM;

class Todo extends Model
{
	protected static string $table = 'todos';

	public function all(): IdiormResultSet|array
	{
		return ORM::forTable(self::$table)->findMany();
	}
}
<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTodoTable extends AbstractMigration
{
	public function change()
	{
		$table = $this->table('todos');
		$table->addColumn('name', 'string')
			->addColumn('content', 'text')
			->addColumn('is_checked', 'boolean')
			->addColumn('created', 'datetime')
			->create();
	}
}

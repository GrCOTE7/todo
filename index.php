<?php

use App\Controllers\TestController;
use App\Controllers\TodoController;
use Inphinit\Teeny;

require_once './vendor/autoload.php';
require_once './vendor/inphinit/teeny/vendor/Teeny.php';

if (!session_id()) {
	session_start();
}

$app  = new Teeny();
$todo = new TodoController();

$app->action('GET', '/', function () use ($todo) {
	return $todo->index();
});

$app->action('POST', 'form', function () use ($todo) {
	return $todo->form();
});

$app->action('GET', 'edit/<id:num>', function ($id) use ($todo) {
	return $todo->edit($id);
});

$app->action('GET', 'changeStatus/<id:num>', function ($id) use ($todo) {
	return $todo->changeStatus($id);
});

$app->action('POST', 'save', function () use ($todo) {
	return $todo->save();
});

// $app->action('GET', 'resetForm', function ($id) use ($todo) {
// 	return $todo->delete($id);
// });

$app->action('GET', 'delete/<id:num>', function ($id) use ($todo) {
	return $todo->delete($id);
});


// $app->action('POST', 'update', function () use ($todo) {
// 	return $todo->update();
// });
// die (__FILE__.' - '.__LINE__);

$app->action('GET', 't', function () {
	return (new TestController())->test();
});

return $app->exec();
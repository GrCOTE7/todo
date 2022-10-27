<?php

use Inphinit\Teeny;
use App\Controllers\TodoController;


require_once './vendor/autoload.php';
require_once './vendor/inphinit/teeny/vendor/Teeny.php';

$app = new Teeny();

$app->action('GET', '/', function () {
	$home = new TodoController();

	return $home->index();
});

return $app->exec();
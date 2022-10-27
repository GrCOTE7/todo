<?php

/**
 * (ɔ) Online FORMAPRO - GrCOTE7 -2022.
 */

use App\Controllers\HomeController;
use Inphinit\Teeny;

require_once './vendor/autoload.php';
require_once './vendor/inphinit/teeny/vendor/Teeny.php';

$app = new Teeny();

$app->action('GET', '/', function () {
	$home = new HomeController();

	return $home->index();
});

return $app->exec();
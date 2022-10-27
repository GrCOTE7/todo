<?php

/**
 * (ɔ) Online FORMAPRO - GrCOTE7 -2022.
 */

namespace App\Templating;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Template
{
	private Environment $twig;

	public function __construct()
	{
		$loader     = new FilesystemLoader(APP['templating']['templates']);
		$this->twig = new Environment($loader, [
			'cache' => APP['templating']['cache'],
			'debug' => APP['templating']['cache'],
		]);

		$this->twig->addGlobal('APP_NAME', APP['name']);

		$this->twig->addExtension(new \Twig\Extension\DebugExtension());
	}

	public function render(string $template, array $args = []): string
	{
		$template = $this->twig->load($template);

		return $template->render($args);
	}
}
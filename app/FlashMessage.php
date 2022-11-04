<?php

namespace App;

class FlashMessage
{
	private static $_instance;

	private array $session;

	private function __construct()
	{
		$this->session = $_SESSION;
	}

	public static function getInstance(): FlashMessage
	{
		if (is_null(self::$_instance)) {
			self::$_instance = new FlashMessage();
		}

		return self::$_instance;
	}

	public function addError(string $message): void
	{
		$this->session['errors'][] = $message;
	}

	public function getErrors(): array
	{
		return $this->session['errors'];
	}

	public function hasErrors(): bool
	{
		return count($this->session['errors']) > 0;
	}

	public function getNbErrors(): int
	{
		return count($this->session['errors']);
	}

	public function clearErrors(): void
	{
		$this->session['errors'] = [];
	}
}
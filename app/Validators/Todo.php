<?php

namespace App\Validators;

use App\Contracts\Validator;
use App\FlashMessage;
use Respect\Validation\Validator as v;

class Todo implements Validator
{
	public static function validate(array $data): bool
	{
		$nameIsValid    = self::validateName($data['name']);
		$contentIsValid = self::validateContent($data['content']);
		// $dateIsValid    = self::validateDate($data['date']);

		if (
			!$nameIsValid
			|| !$contentIsValid
			// || !$dateIsValid
		) {
			return false;
		}

		return true;
	}

	protected static function addError(string $field, string $message): void
	{
		FlashMessage::getInstance()->addError($field, $message);
	}

	private static function validateName(mixed $name): bool
	{
		$nameValidator = v::alnum(' ', '-')->charset('UTF-8')->length(3, 30);

		if (!$nameValidator->validate($name)) {
			self::addError('name', 'Le nom n\'est pas correct');

			return false;
		}

		return true;
	}

	private static function validateContent(mixed $content): bool
	{
		$contentValidator = v::alnum(' ', '-', '.')->charset('UTF-8')->length(1, 255);

		if (!$contentValidator->validate($content)) {
			self::addError('content', 'Le contenu n\'est pas correct');

			return false;
		}

		return true;
	}

	private static function validateDate(mixed $date): bool
	{
		$dateValidator = v::optional(v::dateTime()->greaterThan(new \DateTime()));

		if (!$dateValidator->validate($date)) {
			self::addError('date', "La date n'est pas correcte");

			return false;
		}

		return true;
	}
}

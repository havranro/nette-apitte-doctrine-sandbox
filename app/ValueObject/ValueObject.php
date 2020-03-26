<?php
declare(strict_types=1);

namespace App\Api\ValueObject;


use Apitte\Core\Mapping\Request\BasicEntity;
use App\Api\ValueObject\Exception\InvalidValueException;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Validation;

abstract class ValueObject extends BasicEntity implements ValueObjectInterface
{

	/**
	 * @return ValueObject|null
	 * @throws InvalidValueException
	 */
	public function validate(): ?ValueObjectInterface
	{
		$validator = Validation::createValidatorBuilder()
			->enableAnnotationMapping()
			->getValidator();


		$result = $validator->validate($this);

		if ($result->count() > 0) {
			/** @var ConstraintViolation $firstViolation */
			$firstViolation = $result->get(0);

			throw new InvalidValueException($firstViolation->getPropertyPath() . ': ' . $firstViolation->getMessage());
		}

		return $this;
	}
}





<?php
declare(strict_types=1);

namespace App\Api\ValueObject;

use Symfony\Component\Validator\Constraints as Assert;

final class ExampleValueObject extends ValueObject
{
	/**
	 * @var string
	 * @Assert\NotNull()
	 * @Assert\Type("string")
	 */
	public $login;

	/**
	 * @var string
	 * @Assert\NotNull()
	 * @Assert\Type("string")
	 */
	public $password;

	/**
	 * @var string
	 * @Assert\NotNull()
	 * @Assert\Type("string")
	 */
	public $created;

}

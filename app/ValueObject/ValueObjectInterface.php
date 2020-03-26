<?php
declare(strict_types=1);

namespace App\Api\ValueObject;


interface ValueObjectInterface
{
	/** Validate function, which assert annotations in ValueObjects */
	public function validate(): ?self;
}

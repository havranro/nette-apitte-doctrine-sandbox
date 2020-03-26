<?php
declare(strict_types=1);

namespace App\Entity\Factory;

use App\Api\ValueObject\ValueObjectInterface;
use App\Entity\Entity;

interface EntityFactoryInterface
{
	/**
	 * @param ValueObjectInterface $valueObject
	 * @return Entity|null
	 */
	public function create(ValueObjectInterface $valueObject): ?Entity;
}

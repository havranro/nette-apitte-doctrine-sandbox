<?php
declare(strict_types=1);

namespace App\Entity\Factory;

use App\Api\ValueObject\ValueObjectInterface;
use App\Entity\Entity;
use App\Entity\User;
use Nettrine\ORM\EntityManagerDecorator;

class UserEntityFactory implements EntityFactoryInterface
{
	/**
	 * @param ValueObjectInterface $loginValueObject
	 * @return Entity|null
	 * @throws \Exception
	 */
	public function create(ValueObjectInterface $loginValueObject): ?Entity
	{
		$user = new User();
		$user->setLogin($loginValueObject->login);
		$user->setPassword($loginValueObject->password);

		$created = new \DateTime($loginValueObject->created);
		$created->format('Y-m-d H:i:s');
		$user->setCreated($created);

		return $user;
	}
}

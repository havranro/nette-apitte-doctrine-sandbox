<?php
declare(strict_types=1);

namespace App\Entity;

use DateTime;
use Doctrine\DBAL\Exception\InvalidArgumentException;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User extends Entity
{
	private const ROLE_ADMIN = 'ADMIN';
	private const ROLE_USER = 'USER';


	/**
	 * @ORM\Column(name="login", type="string")
	 * @var string
	 */
	private $login;


	/**
	 * @ORM\Column(name="password", type="string")
	 * @var string
	 */
	private $password;


	/**
	 * @ORM\Column(name="created", type="string")
	 * @var DateTime
	 */
	private $created;


	/**
	 * @param string $login
	 * @return User
	 */
	public function setLogin(string $login): User
	{
		$this->login = $login;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLogin(): string
	{
		return $this->login;
	}

	/**
	 * @param string $password
	 * @return User
	 */
	public function setPassword(string $password): User
	{
		$this->password = $password;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getPassword(): string
	{
		return $this->password;
	}

	/**
	 * @return DateTime
	 */
	public function getCreated(): DateTime
	{
		return $this->created;
	}

	/**
	 * @param DateTime $created
	 */
	public function setCreated(DateTime $created): void
	{
		$this->created = $created;
	}

}

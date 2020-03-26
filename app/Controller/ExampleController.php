<?php
declare(strict_types=1);

namespace App\Api\Controller;

use Apitte\Core\Annotation\Controller\Method;
use Apitte\Core\Annotation\Controller\Path;
use Apitte\Core\Annotation\Controller\RequestMapper;
use Apitte\Core\Annotation\Controller\ControllerPath;
use Apitte\Core\Http\ApiRequest;
use Apitte\Core\Http\ApiResponse;
use App\Api\ValueObject\ExampleValueObject;
use App\Entity\Factory\UserEntityFactory;
use App\Entity\User;

/**
 * @ControllerPath("/example")
 *
 * Class ExampleController
 * @package App\Api\Controllers
 */
final class ExampleController extends BaseController
{
	/**
	 * @var UserEntityFactory
	 */
	private $userEntityFactory;


	public function __construct(UserEntityFactory $userEntityFactory)
	{
		$this->userEntityFactory = $userEntityFactory;
	}

	/**
	 * @Path("/")
	 * @Method("GET")
	 * @RequestMapper(entity="App\Api\ValueObject\Login")
	 */
	public function login(ApiRequest $request, ApiResponse $response): ApiResponse
	{
		/** @var ExampleValueObject $valueObject */
		$valueObject = $this->getRequestEntity($request);

		/** @var User $userEntity */
		$userEntity = $this->userEntityFactory->create($valueObject);

		return $response->writeJsonBody([
			'login' => $userEntity->getLogin(),
			'password' => $userEntity->getPassword(),
			'created' => $userEntity->getCreated()
		]);
	}
}

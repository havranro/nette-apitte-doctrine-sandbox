<?php
declare(strict_types=1);

namespace App\Api\Controller;

use Apitte\Core\Http\ApiRequest;
use Apitte\Core\UI\Controller\IController;
use Apitte\Core\Annotation\Controller;
use Apitte\Core\Annotation\Controller\ControllerPath;

/**
 * Class BaseController
 * @ControllerPath("/api")
 */
abstract class BaseController implements IController
{
	/**
	 * @param ApiRequest $request
	 * @param bool $validate
	 * @return mixed
	 */
	public function getRequestEntity(ApiRequest $request, $validate = true)
	{
		$entity = $request->getEntity()
			->fromRequest($request);

		if ($validate) {
			$entity->validate();
		}

		return $entity;
	}
}

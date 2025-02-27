<?php

declare(strict_types=1);

namespace App\Router;

use Nette;
use Nette\Application\Routers\RouteList;
use Contributte\ApiRouter\ApiRoute;


final class RouterFactory
{
	use Nette\StaticClass;

	public static function createRouter(): RouteList
	{
		$router = new RouteList;

		$router->addRoute(new ApiRoute('/hello', 'Home'));

//		$router->addRoute('<presenter>/<action>[/<id>]', 'Home:getAll');
		return $router;
	}
}

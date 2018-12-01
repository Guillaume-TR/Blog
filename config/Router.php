<?php

namespace App\config;

use App\app\controller\FrontController;
use App\app\controller\ErrorController;

/** Manage the routing
 * Class Router
 * @package App\config
 */
class Router
{
	private $frontController;
	private $errorController;

	/**
	 * Router constructor.
	 */
	public function __construct()
	{
		$this->frontController = new FrontController();
		$this->errorController = new ErrorController();
	}

	/**
	 *
	 */
	public function run()
	{
		try {
			if (isset($_GET['page'])) {
				switch ($_GET['page']) {
					case 'home': $this->frontController->home();
					break;
					case 'post': $this->frontController->post($_GET['id']);
					break;
					case 'connection': $this->frontController->connection($_POST);
					break;
					case 'disconnect': $this->frontController->disconnect();
					break;
					default: $this->errorController->notFound();
					break;
					}
			} else {
				$this->frontController->home();
			}
		} catch (\Exception $error) {
			$this->errorController->error($error);
		}
	}
}
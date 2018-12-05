<?php

namespace App\config;

use App\app\controller\FrontController;
use App\app\controller\BackController;
use App\app\controller\ErrorController;

class Router
{
	private $frontController;
	private $backController;
	private $errorController;

	public function __construct()
	{
		$this->frontController = new FrontController();
		$this->backController = new BackController();
		$this->errorController = new ErrorController();
	}

	public function run()
	{
		try {
			if (isset($_GET['page'])) {
				if ($_GET['page'] === 'admin') {
					if (isset($_SESSION)) {

					}
				} else {
					switch ($_GET['page']) {
						case 'home': $this->frontController->home();
							break;
						case 'book': $this->frontController->episodes($_GET['id']);
							break;
						case 'connection': $this->frontController->connection($_POST);
							break;
						case 'addAccount': $this->backController->addAccount($_POST);
							break;
						case 'disconnect': $this->frontController->disconnect();
							break;
						default: $this->errorController->notFound();
							break;
					}
				}
			} else {
				$this->frontController->home();
			}
		} catch (\Exception $error) {
			$this->errorController->error($error);
		}
	}
}
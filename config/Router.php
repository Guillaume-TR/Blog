<?php

namespace App\config;

use App\app\controller\FrontController;
use App\app\controller\BackController;
use App\app\controller\ErrorController;

/** Manage the routing
 * Class Router
 * @package App\config
 */
class Router
{
	private $frontController;
	private $backController;
	private $errorController;

	/**
	 * Router constructor.
	 */
	public function __construct()
	{
		$this->frontController = new FrontController();
		$this->backController = new BackController();
		$this->errorController = new ErrorController();
	}

	/**
	 *
	 */
	public function run()
	{
		try {
			if (isset($_GET['page'])) {
				if ($_GET['page'] === 'admin') {
					if (isset($_SESSION['level']) && $_SESSION['level'] === '2') {
						if (isset($_GET['action'])) {
							switch ($_GET['action']) {
								case 'addPost': $this->backController->addPost($_POST);
									break;
								case 'addComment': $this->backController->addComment($_POST);
									break;
								case 'addAccount': $this->backController->addAccount($_POST);
									break;
								case 'deletePost': $this->backController->deletePost($_POST);
									break;
								case 'deleteComment': $this->backController->deleteComment($_POST);
									break;
								case 'deleteAccount': $this->backController->deleteAccount($_POST);
									break;
								default: $this->backController->admin();
									break;
							}
						} else {
							$this->backController->admin();
						}
					} else {
						$this->frontController->home();
					}
				} else {
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
				}
			} else {
				$this->frontController->home();
			}
		} catch (\Exception $error) {
			$this->errorController->error($error);
		}
	}
}
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

	/** Check "GET" and set page
	 *
	 */
	public function run()
	{
		try {
			if (isset($_GET['page'])) {
				if ($_GET['page'] === 'admin') {
					if (isset($_SESSION['level']) && $_SESSION['level'] === '2') {
						if (isset($_GET['action'])) {
							if ($_GET['action'] === 'episode') {
								$this->backController->episode();
							} else if ($_GET['action'] === 'account') {
								$this->backController->account();
							} else if ($_GET['action'] === 'comment') {
								if (isset($_GET['id'])) {
									$this->backController->comment($_GET['id']);
								} else {
									$this->backController->comment();
								}
							} else if ($_GET['action'] === 'addAccount') {
								$this->backController->addAccount($_POST);
							} else if ($_GET['action'] === 'addEpisode') {
								$this->backController->addEpisode($_POST);
							} else {
								if (isset($_GET['id'])) {
									if ($_GET['action'] === 'editEpisode') {
										$this->backController->editEpisode($_POST);
									} else if ($_GET['action'] === 'deleteEpisode') {
										$this->backController->deleteEpisode($_POST);
									} else if ($_GET['action'] === 'approveComment') {
										$this->backController->approveComment($_POST, $_GET['id']);
									} else if ($_GET['action'] === 'deleteComment') {
										$this->backController->deleteComment($_POST);
									} else if ($_GET['action'] === 'editAccount') {
										$this->backController->editAccount($_POST);
									} else if ($_GET['action'] === 'deleteAccount') {
										$this->backController->deleteAccount($_POST);
									}
								}
							}
						} else {
							$this->backController->admin();
						}
					} else {
						$this->errorController->notFound();
					}
				} else {
					if ($_GET['page'] === 'home') {
						$this->frontController->home();
					} else if ($_GET['page'] === 'episode') {
						$this->frontController->episode($_GET['id'], $_POST);
					} else if ($_GET['page'] === 'episodes') {
						$this->frontController->episodes();
					} else if ($_GET['page'] === 'connection') {
						$this->frontController->connection($_POST);
					} else if ($_GET['page'] === 'disconnect') {
						$this->frontController->disconnect();
					} else {
						$this->errorController->notFound();
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
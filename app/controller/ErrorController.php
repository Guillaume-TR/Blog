<?php

namespace App\app\controller;


use App\app\model\View;
/** Control the error page
 * Class ErrorController
 * @package App\app\controller
 */
class ErrorController
{
	private $view;

	public function __construct()
	{
		$this->view = new View();
	}

	public function notFound()
	{
		$this->view->render('notFound', []);
	}

	public function error($error)
	{
		$this->view->render('error', [
			'error' => $error
		]);
	}
}
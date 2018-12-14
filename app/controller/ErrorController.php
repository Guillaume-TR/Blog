<?php

namespace App\app\controller;

use App\app\model\View;

/** Error controller
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

	/** Not found page
	 *
	 */
	public function notFound()
	{
		$this->view->render('notFound', []);
	}

	/** Error page
	 * @param $error
	 */
	public function error($error)
	{
		$this->view->render('error', [
			'error' => $error
		]);
	}
}
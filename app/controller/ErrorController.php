<?php

namespace App\app\controller;


/** Control the error page
 * Class ErrorController
 * @package App\app\controller
 */
class ErrorController
{
	public function notFound()
	{
		require '../view/frontend/notFound.php';
	}

	public function error($error)
	{
		$error = $error;
		require '../view/frontend/error.php';
	}
}
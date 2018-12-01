<?php

namespace App\app\controller;


/**
 * Class ErrorController
 * @package App\app\controller
 */
class ErrorController
{
	/**
	 *
	 */
	public function notFound() {
		require '../view/frontend/notFound.php';
	}

	/**
	 * @param $error
	 */
	public function error($error) {
		$error = $error;
		require '../view/frontend/error.php';
	}
}
<?php

namespace App\app\controller;

use App\app\manager\PostManager;
use App\app\model\View;

/** Control the frontend
 * Class FrontController
 * @package App\app\controller
 */
class FrontController
{
	private $postManage;
	private $view;

	/**
	 * FrontController constructor.
	 */
	public function __construct(){
		$this->postManage = new PostManager();
		$this->view = new View();
	}

	/** Get the home page
	 *
	 */
	public function home() {

		$requestPosts = $this->postManage->getAllPosts();
		$this->view->render('home', [
			'posts' => $requestPosts
		]);
	}
}
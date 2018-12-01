<?php

namespace App\app\controller;

use App\app\manager\PostManager;
use App\app\manager\CommentManager;
use App\app\model\View;

/** Control the frontend
 * Class FrontController
 * @package App\app\controller
 */
class FrontController
{
	private $postManage;
	private $commentManage;
	private $view;

	/**
	 * FrontController constructor.
	 */
	public function __construct(){
		$this->postManage = new PostManager();
		$this->commentManage = new CommentManager();
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

	/** Get the single post page
	 * @param $idPost
	 */
	public function post($idPost) {

		$requestPost = $this->postManage->getPost($idPost);
		$requestComments = $this->commentManage->getComments($idPost);
		$this->view->render('post', [
			'post' => $requestPost,
			'comments' => $requestComments
		]);
	}
}
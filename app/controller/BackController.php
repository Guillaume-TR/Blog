<?php

namespace App\app\controller;

use App\app\manager\PostManager;
use App\app\manager\CommentManager;
use App\app\manager\AccountManager;
use App\app\model\View;

/**
 * Class BackController
 * @package App\app\controller
 */
class BackController
{
	private $postManage;
	private $commentManage;
	private $accountManage;
	private $view;

	/** Get a view
	 * BackController constructor.
	 */
	public function __construct() {
		$this->postManage = new PostManager();
		$this->commentManage = new CommentManager();
		$this->accountManage = new AccountManager();
		$this->view = new View;
	}

	/** Get the admin home page
	 *
	 */
	public function admin() {
		$this->view->render('home', [], true);
	}

	/** Get the admin addpost page
	 * @param $data
	 */
	public function addPost($data) {
		$message = null;
		if (isset($_POST['submit'])) {
			$request = new PostManager();
			$requestGet = $request->addPost($data);
			$message = 'L\'article a été ajouté !';
			if ($requestGet === false) {
				$message = 'L\'article n\'a pas été ajouté, un problème est survenu !';
			}
		}
		$this->view->render('addPost', [
			'post' => $data,
			'message' => $message
		], true);
	}

	/** Get the admin addcomment page
	 * @param $data
	 */
	public function addComment($data) {
		$message = null;
		if (isset($_POST['submit'])) {
			$request = new CommentManager();
			$request->addComment($data);
			$message = 'Le commentaire a été ajouté !';
		}
		$requestPosts = $this->postManage->getAllPosts();
		$this->view->render('addComment', [
			'comment' => $data,
			'message' => $message,
			'posts' => $requestPosts
		], true);
	}

	/** Get the admin addaccount page
	 * @param $data
	 */
	public function addAccount($data) {
		$message = null;
		if (isset($_POST['submit'])) {
			$request = new AccountManager();
			$requestGet = $request->addAccount($data);
			$message = 'Le compte a été ajouté !';
			if ($requestGet === false) {
				$message = 'Le compte n\'a pas été ajouté, un problème est survenu !';
			}
		}
		$this->view->render('addAccount', [
			'account' => $data,
			'message' => $message
		], true);
	}

	/** Get the admin deletepost page
	 * @param $data
	 */
	public function deletePost($data) {
		$message = null;
		if (isset($_POST['submit'])) {
			$request = new PostManager();
			$requestGet = $request->deletePost($data);
			$message = 'L\'article a été supprimé !';
			if ($requestGet === false) {
				$message = 'L\'article n\'a pas été supprimé, un problème est survenu !';
			}
		}
		$requestPosts = $this->postManage->getAllPosts();
		$this->view->render('deletePost', [
			'post' => $data,
			'posts' => $requestPosts,
			'message' => $message
		], true);
	}



	/** Get the admin deleteaccount page
	 * @param $data
	 */
	public function deleteAccount($data) {
		$message = null;
		if (isset($_POST['submit'])) {
			$request = new AccountManager();
			$requestGet = $request->deleteAccount($data);
			$message = 'Le compte a été supprimé !';
			if ($requestGet === false) {
				$message = 'Le compte n\'a pas été supprimé, un problème est survenu !';
			}
		}
		$requestAccounts = $this->accountManage->getAllAccounts();
		$this->view->render('deleteAccount', [
			'account' => $data,
			'accounts' => $requestAccounts,
			'message' => $message
		], true);
	}
}
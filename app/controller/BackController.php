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

	/** Get all views
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

	/** Get for the admin panel, add post page
	 * @param $data
	 */
	public function addPost($data) {
		$message = null;
		$messageType = null;
		if (isset($_POST['submit'])) {
			$request = new PostManager();
			$requestGet = $request->addPost($data);
			$message = 'L\'article a été ajouté !';
			$messageType = 'confirm';
			if ($requestGet === false) {
				$message = 'L\'article n\'a pas été ajouté, un problème est survenu !';
				$messageType = 'error';
			}
		}
		$this->view->render('addPost', [
			'post' => $data,
			'message' => $message,
			'messageType' => $messageType
		], true);
	}

	/** Get for the admin panel, add account page
	 * @param $data
	 */
	public function addAccount($data) {
		$message = null;
		$messageType = null;
		if (isset($_POST['submit'])) {
			$request = new AccountManager();
			$requestGet = $request->addAccount($data);
			$message = 'Le compte à bien été ajouté !';
			$messageType = 'confirm';
			if ($requestGet === false) {
				$message = 'Un problème est survenu ! Réessayez.';
				$messageType = 'error';
			}
		}
		$this->view->render('addAccount', [
			'account' => $data,
			'message' => $message,
			'messageType' => $messageType
		], true);
	}

	/** Get for the admin panel, add comment page
	 * @param $data
	 */
	public function addComment($data) {
		$message = null;
		$messageType = null;
		if (isset($_POST['submit'])) {
			$request = new CommentManager();
			$request->addComment($data);
			$message = 'Le commentaire à bien été ajouté !';
			$messageType = 'confirm';
		}
		$requestPosts = $this->postManage->getAllPosts();
		$this->view->render('addComment', [
			'comment' => $data,
			'posts' => $requestPosts,
			'message' => $message,
			'messageType' => $messageType
		], true);
	}

	/** Get for the admin panel, edit post page
	 * @param $data
	 */
	public function editPost($data) {
		$message = null;
		$messageType = null;
		if (isset($_POST['delete-post'])) {
			$request = new PostManager();
			$requestGet = $request->deletePost($data);
			$message = 'L\'article à bien été supprimé !';
			$messageType = 'confirm';
			if ($requestGet === false) {
				$message = 'Un problème est survenu pendant la suppression ! Réessayez.';
				$messageType = 'error';
			}
		} elseif (isset($_POST['edit-post'])) {
			$request = new PostManager();
			$requestGet = $request->editPost($data);
			$message = 'L\'article à bien été modifié !';
			$messageType = 'confirm';
			if ($requestGet === false) {
				$message = 'Un problème est survenu pendant la modification ! Réessayez.';
				$messageType = 'error';
			}
		}

		$requestPosts = $this->postManage->getAllPosts();
		$this->view->render('editPost', [
			'post' => $data,
			'posts' => $requestPosts,
			'message' => $message,
			'messageType' => $messageType
		], true);
	}

	/** Get for the admin panel, edit account page
	 * @param $data
	 */
	public function editAccount($data) {
		$message = null;
		$messageType = null;
		if (isset($_POST['delete-account'])) {
			$request = new AccountManager();
			$requestGet = $request->deleteAccount($data);
			$message = 'Le compte à bien été supprimé !';
			$messageType = 'confirm';
			if ($requestGet === false) {
				$message = 'Un problème est survenu pendant la suppression ! Réessayez.';
				$messageType = 'error';
			}
		} elseif (isset($_POST['edit-account'])) {
			$request = new AccountManager();
			$requestGet = $request->editAccount($data);
			$message = 'L\'article à bien été modifié !';
			$messageType = 'confirm';
			if ($requestGet === false) {
				$message = 'Un problème est survenu pendant la modification ! Réessayez.';
				$messageType = 'error';
			}
		}
		$requestAccounts = $this->accountManage->getAllAccounts();
		$this->view->render('deleteAccount', [
			'account' => $data,
			'accounts' => $requestAccounts,
			'message' => $message,
			'messageType' => $messageType
		], true);
	}
}
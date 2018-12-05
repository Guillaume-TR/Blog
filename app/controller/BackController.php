<?php

namespace App\app\controller;

use App\app\manager\BookManager;
use App\app\manager\CommentManager;
use App\app\manager\AccountManager;
use App\app\model\View;
class BackController
{
	private $bookManage;
	private $commentManage;
	private $accountManage;
	private $view;

	public function __construct() {
		$this->bookManage = new BookManager();
		$this->commentManage = new CommentManager();
		$this->accountManage = new AccountManager();
		$this->view = new View;
	}

	public function admin() {
		$requestBooks = $this->bookManage->getAllBooks(false);
		$requestEpisodes = $this->bookManage->getAll();
		$this->view->render('home', [
			'books' => $requestBooks,
			'episodes' => $requestEpisodes
		], true);
	}

	public function addEpisode($data) {
		$message = null;
		$messageType = null;
		$idBook = (int) $_GET['id'];
		if (isset($_POST['submit'])) {
			if (isset($_POST['title']) && strlen($_POST['title']) > 0) {
				if (isset($_POST['content']) && strlen($_POST['content']) > 0) {
					$requestGet = $this->bookManage->addEpisode($data, $idBook);
					$message = 'L\'episode a été ajouté !';
					$messageType = 'success';
				} else {
					$message = 'Le contenu de l\'episode ne doit pas être vide.';
					$messageType = 'danger';
				}
			} else {
				$message = 'Veuillez entrer un titre';
				$messageType = 'danger';
			}
		}
		$requestBook = $this->bookManage->getBook($idBook);
		$this->view->render('addEpisode', [
			'episode' => $data,
			'book' => $requestBook,
			'message' => $message,
			'messageType' => $messageType
		], true);
	}

	public function addAccount($data) {
		$message = null;
		$messageType = null;
		if (isset($_POST['submit'])) {
			$request = new AccountManager();
			$requestGet = $request->addAccount($data);
			$message = 'Le compte à bien été ajouté !';
			$messageType = 'success';
			if ($requestGet === false) {
				$message = 'Un problème est survenu ! Réessayez.';
				$messageType = 'danger';
			}
		}
		$this->view->render('addAccount', [
			'account' => $data,
			'message' => $message,
			'messageType' => $messageType
		], true);
	}

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

	public function editPost($data) {
		$message = null;
		$messageType = null;
		if (isset($_POST['delete-post'])) {
			$request = new EpisodeManager();
			$requestGet = $request->deletePost($data);
			$message = 'L\'article à bien été supprimé !';
			$messageType = 'confirm';
			if ($requestGet === false) {
				$message = 'Un problème est survenu pendant la suppression ! Réessayez.';
				$messageType = 'error';
			}
		} elseif (isset($_POST['edit-post'])) {
			$request = new EpisodeManager();
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
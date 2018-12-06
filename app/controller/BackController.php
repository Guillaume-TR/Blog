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
		$requestEpisodes = $this->bookManage->getAllEpisodes();
		$requestReportComments = $this->commentManage->getReportComments();
		$requestAllComments = $this->commentManage->getAllComments();
		$requestAllAccounts = $this->accountManage->getAllAccounts();
		$this->view->render('home', [
			'books' => $requestBooks,
			'episodes' => $requestEpisodes,
			'reportComments' => $requestReportComments,
			'comments' => $requestAllComments,
			'accounts' => $requestAllAccounts
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
					$message = 'L\'épisode a été ajouté !';
					$messageType = 'success';
				} else {
					$message = 'Le contenu de l\'épisode ne doit pas être vide.';
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
			if (isset($_POST['username']) && strlen($_POST['username']) >= 5) {
				if (isset($_POST['password']) && isset($_POST['confirm'])
					&& strlen($_POST['password']) >= 5
					&& $_POST['password'] === $_POST['confirm']) {
					if (isset($_POST['level']) && $_POST['level'] === '1' || $_POST['level'] === '2') {
						$username = $_POST['username'];
						$requestGet = $this->accountManage->checkAccount($username);
						if ($requestGet === 0) {
							$requestGet = $this->accountManage->addAccount($data);
							$message = 'Le compte a été ajouté.';
							$messageType = 'success';
						} else {
							$message = 'Ce nom d\'utilisateur existe déjà.';
							$messageType = 'danger';
						}
					} else {
						$message = 'Choisissez un niveau de permission.';
						$messageType = 'danger';
					}
				} else {
					$message = 'Verifiez que les mots de passe contient au moin 5 caractères et qu\'ils sont identique.';
					$messageType = 'danger';
				}
			} else {
				$message = 'Verifiez que le nom d\'utilisateur contient au moin 5 caractères';
				$messageType = 'danger';
			}
		}
		$this->view->render('addAccount', [
			'account' => $data,
			'message' => $message,
			'messageType' => $messageType
		], true);
	}

	public function editEpisode($data) {
		$message = null;
		$messageType = null;
		$idEpisode = (int) $_GET['id'];
		if (isset($_POST['submit'])) {
			if (isset($_POST['title']) && strlen($_POST['title']) > 0) {
				if (isset($_POST['content']) && strlen($_POST['content']) > 0) {
					$requestGet = $this->bookManage->editEpisode($data, $idEpisode);
					$message = 'L\'épisode a été modifié !';
					$messageType = 'success';
				} else {
					$message = 'Le contenu de l\'épisode ne doit pas être vide.';
					$messageType = 'danger';
				}
			} else {
				$message = 'Veuillez entrer un titre';
				$messageType = 'danger';
			}
		}
		$request = $this->bookManage->getEpisode($idEpisode);
		$requestEpisode = $request->fetch();
		$this->view->render('editEpisode', [
			'episodeEdit' => $data,
			'episode' => $requestEpisode,
			'message' => $message,
			'messageType' => $messageType
		], true);
	}

	public function editAccount($data) {
		$message = null;
		$messageType = null;
		$idAccount = (int) $_GET['id'];
		if (isset($_POST['submit'])) {
			if (isset($_POST['password']) && isset($_POST['confirm'])
				&& strlen($_POST['password']) >= 5
				&& $_POST['password'] === $_POST['confirm'] ) {
				if (isset($_POST['level']) && $_POST['level'] === '1' || $_POST['level'] === '2') {
					$requestGet = $this->accountManage->editAccount($data, $idAccount);
					$message = 'Le compte a été modifié !';
					$messageType = 'success';
				} else {
					$message = 'Choisissez un niveau de permission.';
					$messageType = 'danger';
				}
			} else {
				$message = 'Verifiez que les mots de passe contient au moin 5 caractères et qu\'ils sont identique.';
				$messageType = 'danger';
			}
		}
		$request = $this->accountManage->getAccount($idAccount);
		$requestAccount = $request->fetch();
		$this->view->render('editAccount', [
			'accountEdit' => $data,
			'account' => $requestAccount,
			'message' => $message,
			'messageType' => $messageType
		], true);
	}

	public function editComment($data) {
		$message = null;
		$messageType = null;
		$idComment = (int) $_GET['id'];
		if (isset($_POST['submit'])) {
			if (isset($_POST['content']) && strlen($_POST['content']) > 0) {
				$requestGet = $this->commentManage->editComment($data, $idComment);
				$message = 'Le commentaire a été modifié !';
				$messageType = 'success';
			} else {
				$message = 'Le contenu du commentaire ne doit pas être vide.';
				$messageType = 'danger';
			}
		}
		$request = $this->commentManage->getComment($idComment);
		$requestComment = $request->fetch();
		$this->view->render('editComment', [
			'commentEdit' => $data,
			'comment' => $requestComment,
			'message' => $message,
			'messageType' => $messageType
		], true);
	}

	public function deleteEpisode($data) {
		extract($data);
		$message = null;
		$messageType = null;
		$idEpisode = (int)$_GET['id'];

		$request = $this->bookManage->getEpisode($idEpisode);
		$requestCount = $request->rowCount();
		if ($requestCount === 1) {
			$requestEpisode = $request->fetch();
			if (isset($_POST['submit'])) {
				if ($_POST['title'] === $requestEpisode->getTitle()) {
					$requestGet = $this->bookManage->deleteEpisode($idEpisode);
					$message = 'L\'épisode a été supprimé !';
					$messageType = 'success';
				} else {
					$message = 'Le titre n\'est pas le même.';
					$messageType = 'warning';
				}
			}
			$this->view->render('deleteEpisode', [
				'episode' => $requestEpisode,
				'message' => $message,
				'messageType' => $messageType
			], true);
		} else {
			$this->admin();
		}
	}

	public function deleteComment($data) {
		extract($data);
		$message = null;
		$messageType = null;
		$idComment = (int) $_GET['id'];

		$request = $this->commentManage->getComment($idComment);
		$requestCount = $request->rowCount();
		if ($requestCount === 1) {
			$requestComment = $request->fetch();
			if (isset($_POST['submit'])) {
				if ($_POST['id'] === $requestComment->getId()) {
					$requestGet = $this->commentManage->deleteComment($idComment);
					$message = 'Le commentaire a été supprimé !';
					$messageType = 'success';
				} else {
					$message = 'L\'identifiant du commentaire n\'est pas le même.';
					$messageType = 'warning';
				}
			}
			$this->view->render('deleteComment', [
				'comment' => $requestComment,
				'message' => $message,
				'messageType' => $messageType
			], true);
		} else {
			$this->admin();
		}
	}
}
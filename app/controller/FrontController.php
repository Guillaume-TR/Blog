<?php

namespace App\app\controller;

use App\app\manager\BookManager;
use App\app\manager\CommentManager;
use App\app\manager\AccountManager;
use App\app\model\View;
class FrontController
{
	private $bookManage;
	private $commentManage;
	private $accountManage;
	private $view;

	public function __construct(){
		$this->bookManage = new BookManager();
		$this->commentManage = new CommentManager();
		$this->accountManage = new AccountManager();
		$this->view = new View();
	}

	public function home() {

		$requestBooks = $this->bookManage->getAllBooks(false);
		$this->view->render('home', [
			'books' => $requestBooks
		]);
	}

	public function episodes($idBook) {
		$message = null;
		$messageType = null;
		if (isset($_POST['submit'])) {
			if (isset($_POST['author']) && strlen($_POST['author']) > 0) {
				if (isset($_POST['content']) && strlen($_POST['content']) > 0) {
					$_POST['episode_id'] = $_POST['submit'];
					unset($_POST['submit']);

					$request = $this->commentManage->addComment($_POST);
					$message = 'Le commentaire à bien été ajouté !';
					$messageType = 'success';
				} else {
					$message = 'Le contenu de votre message est vide.';
					$messageType = 'danger';
				}
			} else {
				$message = 'Indiquez votre prénom.';
				$messageType = 'danger';
			}
		}
		if (isset($_GET['report'])) {
			$commentId = (int) $_GET['report'];
			$request = $this->commentManage->reportComment($commentId);
			$message = 'Le commentaire à bien été signalé !';
			$messageType = 'info';
		}
		$requestBooks = $this->bookManage->getBook($idBook);
		$requestEpisodes = $this->bookManage->getAllEpisodes($idBook);
		$requestComments = $this->commentManage->getAllComments();
		$this->view->render('episodes', [
			'episodes' => $requestEpisodes,
			'book' => $requestBooks,
			'comments' => $requestComments,
			'message' => $message,
			'messageType' => $messageType
		]);
	}

	public function connection($data) {
		extract($data);
		$message = null;
		$messageType = null;
		$requestConnection = null;

		if (isset($_POST['submit'])) {
			/** @var string $username */
			$request = $this->accountManage->checkAccount($username);
			$countGet = $request->rowCount();

			if (isset($countGet) && $countGet === 1) {
				$requestGet = $request->fetch();
				/** @var string $password */
				$passwordCheck = password_verify($password, $requestConnection->getPass());

				if ($passwordCheck) {
					$_SESSION['id'] = $requestConnection->getId();
					$_SESSION['username'] = $requestConnection->getUser();
					$_SESSION['level'] = $requestConnection->getLevel();

				} else {
					$message = 'Nom d\'utilisateur ou mot de passe incorrect';
					$messageType = 'danger';
				}
			} else {
				$message = 'Nom d\'utilisateur ou mot de passe incorrect';
				$messageType = 'danger';
			}
		}
		$this->view->render('connection', [
			'connection' => $requestConnection,
			'message' => $message,
			'messageType' => $messageType
		]);
	}

	public function disconnect() {
		session_destroy();
		$this->view->render('disconnect', []);
	}
}
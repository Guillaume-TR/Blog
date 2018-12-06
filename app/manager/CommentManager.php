<?php

namespace App\app\manager;


class CommentManager extends DatabaseManager
{
	public function getAllComments() {
		$statement = 'SELECT * FROM comments ORDER BY creation_date DESC';
		$request = $this->getSql($statement, 'App\app\model\Comment');
		$requestGet = $request->fetchAll();

		return $requestGet;
	}

	public function getReportComments() {
		$statement = 'SELECT * FROM comments WHERE report = true';
		$request = $this->getSql($statement, 'App\app\model\Comment');
		$requestGet = $request->fetchAll();

		return $requestGet;
	}

	public function getComment($idComment) {
		$statement = 'SELECT * FROM comments WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Comment', [$idComment]);

		return $requestGet;
	}

	public function addComment($data) {
		extract($data);
		/** @var string $content */
		/** @var string $author */
		/** @var string $episode_id */
		$statement = 'INSERT INTO comments(content, author, episode_id, creation_date) VALUES(?, ?, ?, NOW())';
		$requestGet = $this->getSql($statement, 'App\app\model\Comment', [$content, $author, $episode_id]);

		return $requestGet;
	}

	public function reportComment($commentId) {
		$statement = 'UPDATE comments SET report = ? WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Comment', [true ,$commentId]);

		return $requestGet;
	}

	public function editComment($data, $idComment) {
		extract($data);
		/** @var string $content */
		$statement = 'UPDATE comments SET content = ?, edited = ? WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Comment', [$content, true, $idComment]);

		return $requestGet;
	}

	public function deleteComment($idComment) {
		$statement = 'DELETE FROM comments WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Comment', [$idComment]);

		return $requestGet;
	}
}
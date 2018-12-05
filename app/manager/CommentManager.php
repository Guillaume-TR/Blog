<?php

namespace App\app\manager;

use \PDO;
/** Manage the comments
 * Class CommentManager
 * @package App\app\model
 */
class CommentManager extends DatabaseManager
{
	public function getAllComments() {
		$statement = 'SELECT * FROM comments ORDER BY creation_date DESC';
		$request = $this->getSql($statement, 'App\app\model\Comment');
		$requestGet = $request->fetchAll();

		return $requestGet;
	}
	/**
	 * @param $idPost
	 * @return array
	 */
	public function getComments($idPost) {
		$statement = 'SELECT * FROM comments WHERE post_id = ? ORDER BY creation_date DESC';
		$request = $this->getSql($statement, 'App\app\model\Comment', [$idPost]);
		$requestGet = $request->fetchAll();

		return $requestGet;
	}

	/** Add a comment
	 * @param $data
	 * @return mixed
	 */
	public function addComment($data) {
		extract($data);
		/** @var string $content */
		/** @var string $author */
		/** @var string $episode_id */
		$statement = 'INSERT INTO comments(content, author, episode_id, creation_date) VALUES(?, ?, ?, NOW())';
		$requestGet = $this->getSql($statement, 'App\app\model\Comment', [$content, $author, $episode_id]);

		return $requestGet;
	}

	/** Add a comment
	 * @param $commentId
	 * @return mixed
	 */
	public function reportComment($commentId) {
		$statement = 'UPDATE comments SET report = ? WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Comment', [true ,$commentId]);

		return $requestGet;
	}
}
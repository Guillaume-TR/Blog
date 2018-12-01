<?php

namespace App\app\manager;

use \PDO;
/** Manage the comments
 * Class CommentManager
 * @package App\app\model
 */
class CommentManager extends DatabaseManager
{
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
}
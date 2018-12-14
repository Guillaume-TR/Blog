<?php

namespace App\app\manager;


/** Manage comment on the database
 * Class CommentManager
 * @package App\app\manager
 */
class CommentManager extends DatabaseManager
{
	/** Get comments
	 * @return array
	 */
	public function getAllComments()
	{
		$statement = 'SELECT * FROM comments ORDER BY creation_date DESC';
		$request = $this->getSql($statement, 'App\app\model\Comment');
		$requestGet = $request->fetchAll();

		return $requestGet;
	}

	/** Get comments of episode
	 * @param $idEpisode
	 * @return bool|false|\PDOStatement
	 */
	public function getComments($idEpisode)
	{
		$statement = 'SELECT * FROM comments WHERE episode_id = ? ORDER BY creation_date DESC ';
		$requestGet = $this->getSql($statement, 'App\app\model\Comment', [$idEpisode]);

		return $requestGet;
	}

	/** Get comment
	 * @param $idComment
	 * @return bool|false|\PDOStatement
	 */
	public function getComment($idComment)
	{
		$statement = 'SELECT * FROM comments WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Comment', [$idComment]);

		return $requestGet;
	}

	/** Get report comments
	 * @return array
	 */
	public function getReportComments()
	{
		$statement = 'SELECT * FROM comments WHERE report = true';
		$request = $this->getSql($statement, 'App\app\model\Comment');
		$requestGet = $request->fetchAll();

		return $requestGet;
	}

	/** Add comment
	 * @param $idEpisode
	 * @param $data
	 * @return bool|false|\PDOStatement
	 */
	public function addComment($idEpisode, $data)
	{
		extract($data);
		/** @var string $content */
		/** @var string $author */
		$statement = 'INSERT INTO comments(content, author, episode_id, creation_date) VALUES(?, ?, ?, NOW())';
		$requestGet = $this->getSql($statement, 'App\app\model\Comment', [$content, $author, $idEpisode]);

		return $requestGet;
	}

	/** Set comment as reported
	 * @param $commentId
	 * @return bool|false|\PDOStatement
	 */
	public function reportComment($commentId)
	{
		$statement = 'UPDATE comments SET report = ? WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Comment', [true, $commentId]);

		return $requestGet;
	}

	/** Set comment as approuved
	 * @param $data
	 * @param $idComment
	 * @return bool|false|\PDOStatement
	 */
	public function approveComment($data, $idComment)
	{
		extract($data);
		$statement = 'UPDATE comments SET report = false WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Comment', [$idComment]);

		return $requestGet;
	}

	/** Delete comment
	 * @param $data
	 * @param $idComment
	 * @return bool|false|\PDOStatement
	 */
	public function deleteComment($data, $idComment)
	{
		extract($data);
		$statement = 'DELETE FROM comments WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Comment', [$idComment]);

		return $requestGet;
	}
}
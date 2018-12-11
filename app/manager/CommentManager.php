<?php

namespace App\app\manager;


/** Manage the comment on the database
 * Class CommentManager
 * @package App\app\manager
 */
class CommentManager extends DatabaseManager
{
	/** Get comments on the database
	 * @return array
	 */
	public function getAllComments()
	{
		$statement = 'SELECT * FROM comments ORDER BY creation_date DESC';
		$request = $this->getSql($statement, 'App\app\model\Comment');
		$requestGet = $request->fetchAll();

		return $requestGet;
	}

	/** Get report comment on the database
	 * @return array
	 */
	public function getReportComments()
	{
		$statement = 'SELECT * FROM comments WHERE report = true';
		$request = $this->getSql($statement, 'App\app\model\Comment');
		$requestGet = $request->fetchAll();

		return $requestGet;
	}

	/** Get comment on the database
	 * @param $idComment
	 * @return bool|false|\PDOStatement
	 */
	public function getComment($idComment)
	{
		$statement = 'SELECT * FROM comments WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Comment', [$idComment]);

		return $requestGet;
	}

	/** Add comment on the database
	 * @param $data
	 * @return bool|false|\PDOStatement
	 */
	public function addComment($data)
	{
		extract($data);
		/** @var string $content */
		/** @var string $author */
		/** @var string $episode_id */
		$statement = 'INSERT INTO comments(content, author, episode_id, creation_date) VALUES(?, ?, ?, NOW())';
		$requestGet = $this->getSql($statement, 'App\app\model\Comment', [$content, $author, $episode_id]);

		return $requestGet;
	}

	/** Report comment on the database
	 * @param $commentId
	 * @return bool|false|\PDOStatement
	 */
	public function reportComment($commentId)
	{
		$statement = 'UPDATE comments SET report = ? WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Comment', [true, $commentId]);

		return $requestGet;
	}

	/** Edite comment on the database
	 * @param $data
	 * @param $idComment
	 * @return bool|false|\PDOStatement
	 */
	public function editComment($data, $idComment)
	{
		extract($data);
		/** @var string $content */
		$statement = 'UPDATE comments SET content = ?, edited = ? WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Comment', [$content, true, $idComment]);

		return $requestGet;
	}

	/** Delete comment on the database
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
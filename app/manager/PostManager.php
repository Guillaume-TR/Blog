<?php

namespace App\app\manager;


/** Manage the posts
 * Class PostManager
 * @package App\app\model
 */
class PostManager extends DatabaseManager
{
	/** Get all posts
	 * @return array
	 */
	public function getAllPosts() {
		$statement = 'SELECT * FROM posts ORDER BY creation_date DESC';
		$request = $this->getSql($statement, 'App\app\model\Post');
		$requestGet = $request->fetchAll();
		return $requestGet;
	}

	/** Get one posts
	 * @param $idPost
	 * @return bool|false|\PDOStatement
	 */
	public function getPost($idPost) {
		$statement = 'SELECT * FROM posts WHERE id = ?';
		$request = $this->getSql($statement, 'App\app\model\Post', [$idPost]);
		$requestGet = $request->fetch();

		return $requestGet;
	}

}
<?php

namespace App\app\manager;


class BookManager extends DatabaseManager
{
	public function getAllBooks($order = true)
	{
		$statement = 'SELECT * FROM books';
		if ($order) {
			$statement = 'SELECT * FROM books ORDER BY id DESC';
		}
		$request = $this->getSql($statement, 'App\app\model\Book');
		$requestGet = $request->fetchAll();
		return $requestGet;
	}

	public function getBook($idBook)
	{
		$statement = 'SELECT * FROM books WHERE id = ?';
		$request = $this->getSql($statement, 'App\app\model\Book', [$idBook]);
		$requestGet = $request->fetch();

		return $requestGet;
	}

	public function getAllEpisodes($idBook)
	{
		$statement = 'SELECT * FROM episodes WHERE book_id = ?';
		$request = $this->getSql($statement, 'App\app\model\Episode', [$idBook]);
		$requestGet = $request->fetchAll();

		return $requestGet;
	}


	public function getAll()
	{
		$statement = 'SELECT * FROM episodes';
		$request = $this->getSql($statement, 'App\app\model\Episode');
		$requestGet = $request->fetchAll();

		return $requestGet;
	}

	public function getEpisode($idEpisode)
	{
		$statement = 'SELECT * FROM episodes WHERE id = ?';
		$request = $this->getSql($statement, 'App\app\model\Episode', [$idEpisode]);
		$requestGet = $request->fetch();

		return $requestGet;
	}

	public function addEpisode($data, $idBook)
	{
		extract($data);
		/** @var string $title */
		/** @var string $content */
		$statement = 'INSERT INTO episodes(title, content, book_id, publication_date) VALUES(?,?,?, NOW())';
		$requestGet = $this->getSql($statement, 'App\app\model\Episode', [$title, $content,$idBook]);

		return $requestGet;
	}
}
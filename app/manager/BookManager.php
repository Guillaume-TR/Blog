<?php

namespace App\app\manager;


/** Manage the book on the database
 * Class BookManager
 * @package App\app\manager
 */
class BookManager extends DatabaseManager
{
	/** Get books on the database
	 * @param bool $order
	 * @return array
	 */
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

	/** Get book on the database
	 * @param $idBook
	 * @return mixed
	 */
	public function getBook($idBook)
	{
		$statement = 'SELECT * FROM books WHERE id = ?';
		$request = $this->getSql($statement, 'App\app\model\Book', [$idBook]);
		$requestGet = $request->fetch();

		return $requestGet;
	}
}
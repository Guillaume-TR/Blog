<?php

namespace App\app\manager;


/** Manage the Episode on the database
 * Class EpisodeManager
 * @package App\app\manager
 */
class EpisodeManager extends DatabaseManager
{
	/** Get episodes on the database
	 * @return array
	 */
	public function getAllEpisodes()
	{
		$statement = 'SELECT * FROM episodes';
		$request = $this->getSql($statement, 'App\app\model\Episode');
		$requestGet = $request->fetchAll();

		return $requestGet;
	}

	/** Get episodes of the book on the database
	 * @param $idBook
	 * @return array
	 */
	public function getAllEpisodesBook($idBook)
	{
		$statement = 'SELECT * FROM episodes WHERE book_id = ? ORDER BY id';
		$request = $this->getSql($statement, 'App\app\model\Episode', [$idBook]);
		$requestGet = $request->fetchAll();

		return $requestGet;
	}

	/** Get episode on the database
	 * @param $idEpisode
	 * @return bool|false|\PDOStatement
	 */
	public function getEpisode($idEpisode)
	{
		$statement = 'SELECT * FROM episodes WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Episode', [$idEpisode]);

		return $requestGet;
	}

	/** Add episode on the database
	 * @param $data
	 * @param $idBook
	 * @return bool|false|\PDOStatement
	 */
	public function addEpisode($data, $idBook)
	{
		extract($data);
		/** @var string $title */
		/** @var string $content */
		$statement = 'INSERT INTO episodes(title, content, book_id, publication_date) VALUES(?,?,?, NOW())';
		$requestGet = $this->getSql($statement, 'App\app\model\Episode', [$title, $content, $idBook]);

		return $requestGet;
	}

	/** Edit episode on the database
	 * @param $data
	 * @param $idEpisode
	 * @return bool|false|\PDOStatement
	 */
	public function editEpisode($data, $idEpisode)
	{
		extract($data);
		/** @var string $title */
		/** @var string $content */
		$statement = 'UPDATE episodes SET title = ?, content = ? WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Episode', [$title, $content, $idEpisode]);

		return $requestGet;
	}

	/** Delete episode on the database
	 * @param $data
	 * @param $idEpisode
	 * @return bool|false|\PDOStatement
	 */
	public function deleteEpisode($data, $idEpisode)
	{
		extract($data);
		$statement = 'DELETE FROM episodes WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Episode', [$idEpisode]);

		return $requestGet;
	}
}
<?php

namespace App\app\manager;


/** Manage episode on the database
 * Class EpisodeManager
 * @package App\app\manager
 */
class EpisodeManager extends DatabaseManager
{
	/** Get episodes
	 * @return array
	 */
	public function getEpisodes()
	{
		$statement = 'SELECT id, title, content, DATE_FORMAT(publication_date, \'%d / %m / %Y\')  AS publication_date FROM episodes ORDER BY publication_date';
		$request = $this->getSql($statement, 'App\app\model\Episode');
		$requestGet = $request->fetchAll();

		return $requestGet;
	}

	/** Get episode
	 * @param $idEpisode
	 * @return bool|false|\PDOStatement
	 */
	public function getEpisode($idEpisode)
	{
		$statement = 'SELECT id, title, content, DATE_FORMAT(publication_date, \'%d / %m / %Y\')  AS publication_date FROM episodes WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Episode', [$idEpisode]);

		return $requestGet;
	}

	/** Get last episode posted
	 * @return mixed
	 */
	public function getLastEpisode()
	{
		$statement = 'SELECT id, title, content, DATE_FORMAT(publication_date, \'%d / %m / %Y\')  AS publication_date FROM episodes ORDER BY publication_date DESC LIMIT 1';
		$request = $this->getSql($statement, 'App\app\model\Episode');
		$requestGet = $request->fetch();

		return $requestGet;
	}

	/** Add episode
	 * @param $data
	 * @return bool|false|\PDOStatement
	 */
	public function addEpisode($data)
	{
		extract($data);
		/** @var string $title */
		/** @var string $content */
		$statement = 'INSERT INTO episodes(title, content, publication_date) VALUES(?,?, NOW())';
		$requestGet = $this->getSql($statement, 'App\app\model\Episode', [$title, $content]);

		return $requestGet;
	}

	/** Edit episode
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

	/** Delete episode
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
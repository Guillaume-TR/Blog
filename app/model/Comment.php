<?php

namespace App\app\model;


/**
 * Class Comment
 * @package App\app\model
 */
class Comment
{
	private $id;
	private $pseudo;
	private $content;
	private $creation_date;
	private $episode_id;
	private $report;

	// GETTER
	public function getId()
	{
		return $this->id;
	}

	public function getPseudo()
	{
		return $this->pseudo;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function getDate()
	{
		return $this->creation_date;
	}

	public function getEpisode()
	{
		return $this->episode_id;
	}

	public function getReport()
	{
		return $this->report;
	}

	// SETTER
	public function setId($id)
	{
		$this->id = $id;
	}

	public function setPseudo($pseudo)
	{
		$this->pseudo = $pseudo;
	}

	public function setContent($content)
	{
		$this->content = $content;
	}

	public function setDate($creation_date)
	{
		$this->creation_date = $creation_date;
	}

	public function setEpisode($episode_id)
	{
		$this->episode_id = $episode_id;
	}

	public function setReport($report)
	{
		$this->report = $report;
	}
}
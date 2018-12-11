<?php

namespace App\app\model;


/**
 * Class Comment
 * @package App\app\model
 */
class Comment
{
	private $id;
	private $author;
	private $content;
	private $creation_date;
	private $episode_id;
	private $report;
	private $edited;

	// GETTER
	public function getId()
	{
		return $this->id;
	}

	public function getAuthor()
	{
		return $this->author;
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

	public function getEdited()
	{
		return $this->edited;
	}

	// SETTER
	public function setId($id)
	{
		$this->id = $id;
	}

	public function setAuthor($author)
	{
		$this->author = $author;
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

	public function setEdited($edited)
	{
		$this->edited = $edited;
	}
}
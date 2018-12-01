<?php

namespace App\app\model;


/**
 * Class Post
 * @package App\app\model
 */
class Post
{
	private $id;
	private $title;
	private $content;
	private $author;
	private $creation_date;

	// GETTER
	public function getId() { return $this->id; }
	public function getTitle() { return $this->title; }
	public function getContent() { return $this->content; }
	public function getAuthor() { return $this->author; }
	public function getCreationDate() { return $this->creation_date; }
	// SETTER
	public function setId($id) { $this->id = $id; }
	public function setTitle($title) { $this->title = $title; }
	public function setContent($content) { $this->content = $content; }
	public function setAuthor($author) { $this->author = $author; }
	public function setCreationDate($creation_date) { $this->creation_date = $creation_date; }
}
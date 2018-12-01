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
	private $post_id;

	// GETTER
	public function getId() { return $this->id; }
	public function getAuthor() { return $this->author; }
	public function getContent() { return $this->content; }
	public function getCreationDate() { return $this->creation_date; }
	public function getPostId() { return $this->post_id; }
	// SETTER
	public function setId($id) { $this->id = $id; }
	public function setAuthor($author) { $this->author = $author; }
	public function setContent($content) { $this->content = $content; }
	public function setCreationDate($creation_date) { $this->creation_date = $creation_date; }
	public function setPostId($post_id) { $this->post_id = $post_id; }
}
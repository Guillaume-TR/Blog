<?php

namespace App\app\model;


class Book
{
	private $id;
	private $name;

	// GETTER
	public function getId() { return $this->id; }
	public function getName() { return $this->name; }
	// SETTER
	public function setId($id) { $this->id = $id; }
	public function setName($name) { $this->name = $name; }
}
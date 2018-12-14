<?php

namespace App\app\model;


/**
 * Class Account
 * @package App\app\model
 */
class Account
{
	private $id;
	private $username;
	private $password;
	private $creation_date;
	private $level;

	// GETTER
	public function getId()
	{
		return $this->id;
	}

	public function getUser()
	{
		return $this->username;
	}

	public function getPass()
	{
		return $this->password;
	}

	public function getDate()
	{
		return $this->creation_date;
	}

	public function getLevel()
	{
		return $this->level;
	}

	// SETTER
	public function setId($id)
	{
		$this->id = $id;
	}

	public function setUser($username)
	{
		$this->username = $username;
	}

	public function setPass($password)
	{
		$this->password = $password;
	}

	public function setDate($creation_date)
	{
		$this->creation_date = $creation_date;
	}

	public function setLevel($level)
	{
		$this->level = $level;
	}
}
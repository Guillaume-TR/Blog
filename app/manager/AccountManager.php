<?php

namespace App\app\manager;


/** Manage account on the database
 * Class CommentManager
 * @package App\app\manager
 */
class AccountManager extends DatabaseManager
{
	/** Get accounts
	 * @return array
	 */
	public function getAllAccounts()
	{
		$statement = 'SELECT * FROM accounts ORDER BY id DESC';
		$request = $this->getSql($statement, 'App\app\model\Account');
		$requestGet = $request->fetchAll();

		return $requestGet;
	}

	/** Get single account
	 * @param $idAccount
	 * @return bool|false|\PDOStatement
	 */
	public function getAccount($idAccount)
	{
		$statement = 'SELECT * FROM accounts WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Account', [$idAccount]);

		return $requestGet;
	}

	/** Check account
	 * @param $username
	 * @return bool|false|\PDOStatement
	 */
	public function checkAccount($username)
	{
		$statement = 'SELECT * FROM accounts WHERE username = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Account', [$username]);

		return $requestGet;
	}

	/** Add account
	 * @param $data
	 * @return bool|false|\PDOStatement
	 */
	public function addAccount($data)
	{
		extract($data);
		/** @var string $username */
		/** @var string $password */
		/** @var string $level */
		$password = password_hash($password, PASSWORD_DEFAULT);
		$statement = 'INSERT INTO accounts(username, password, level, creation_date) VALUES(?, ?, ?, NOW())';
		$requestGet = $this->getSql($statement, 'App\app\model\Account', [$username, $password, $level]);

		return $requestGet;
	}

	/** Edit account
	 * @param $data
	 * @param $idAccount
	 * @return bool|false|\PDOStatement
	 */
	public function editAccount($data, $idAccount)
	{
		extract($data);
		/** @var string $password */
		/** @var string $level */
		$password = password_hash($password, PASSWORD_DEFAULT);
		$statement = 'UPDATE accounts SET password = ?, level = ? WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Account', [$password, $level, $idAccount]);

		return $requestGet;
	}

	/** Delete account
	 * @param $data
	 * @param $idAccount
	 * @return bool|false|\PDOStatement
	 */
	public function deleteAccount($data, $idAccount)
	{
		extract($data);
		$statement = 'DELETE FROM accounts WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Account', [$idAccount]);

		return $requestGet;
	}
}
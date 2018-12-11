<?php

namespace App\app\manager;


class AccountManager extends DatabaseManager
{
	/** Get accounts on the database
	 * @return array
	 */
	public function getAllAccounts()
	{
		$statement = 'SELECT * FROM accounts ORDER BY id DESC';
		$request = $this->getSql($statement, 'App\app\model\Account');
		$requestGet = $request->fetchAll();

		return $requestGet;
	}

	/** Get account on the database
	 * @param $idAccount
	 * @return bool|false|\PDOStatement
	 */
	public function getAccount($idAccount)
	{
		$statement = 'SELECT * FROM accounts WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Account', [$idAccount]);

		return $requestGet;
	}

	/** Check account on the database
	 * @param $username
	 * @return bool|false|\PDOStatement
	 */
	public function checkAccount($username)
	{
		$statement = 'SELECT * FROM accounts WHERE username = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Account', [$username]);

		return $requestGet;
	}

	/** Add account on the database
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

	/** Edit account on the database
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

	/** Delete account on the database
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
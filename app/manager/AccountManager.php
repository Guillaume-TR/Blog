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

	/** Check account by email
	 * @param $email
	 * @return bool|false|\PDOStatement
	 */
	public function checkAccountByEmail($email)
	{
		$statement = 'SELECT * FROM accounts WHERE email = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Account', [$email]);

		return $requestGet;
	}

	/** Add account
	 * @param $data
	 * @return bool|false|\PDOStatement
	 */
	public function addAccount($data)
	{
		extract($data);
		$password = password_hash($password, PASSWORD_DEFAULT);
		$statement = 'INSERT INTO accounts(username, email, password, level, creation_date) VALUES(?, ?, ?, ?, NOW())';
		$requestGet = $this->getSql($statement, 'App\app\model\Account', [$username, $email, $password, $level]);

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
		$password = password_hash($password, PASSWORD_DEFAULT);
		$statement = 'UPDATE accounts SET email = ?, password = ?, level = ? WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Account', [$email, $password, $level, $idAccount]);

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

	/** Add an ticket to the account
	 * @param $ticket
	 * @param $idAccount
	 * @return bool|false|\PDOStatement
	 */
	public function addTicket($ticket, $idAccount)
	{
		$statement = 'UPDATE accounts SET ticket = ? WHERE id = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Account', [$ticket, $idAccount]);

		return $requestGet;
	}

	/** Check ticket to the account
	 * @param $ticket
	 * @return bool|false|\PDOStatement
	 */
	public function checkTicket($ticket)
	{
		$statement = 'SELECT * FROM accounts WHERE ticket = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Account', [$ticket]);

		return $requestGet;
	}

	/** Change an password to the account
	 * @param $data
	 * @param $ticket
	 * @return bool|false|\PDOStatement
	 */
	public function changePassword($data, $ticket)
	{
		extract($data);
		$password = password_hash($password, PASSWORD_DEFAULT);
		$statement = 'UPDATE accounts SET password = ?, ticket = ? WHERE ticket = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Account', [$password, null, $ticket]);

		return $requestGet;
	}
}
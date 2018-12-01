<?php

namespace App\app\manager;


class AccountManager extends DatabaseManager
{
	private $session;

	/** Add a account
	 * @param $data
	 * @return mixed
	 */
	public function addAccount($data)
	{
		extract($data);
		/** @var string $username */
		/** @var string $password */
		/** @var string $level */
		$username = ucfirst($username);
		$statement = 'SELECT * FROM accounts WHERE username = ?';
		$request = $this->getSql($statement, 'App\app\model\Account', [$username]);
		$countGet = $request->rowCount();
		$requestGet = false;

		if ($countGet === 0) {
			$password = password_hash($password, PASSWORD_DEFAULT);
			$statement = 'INSERT INTO accounts(username, password, level, creation_date) VALUES(?, ?, ?, NOW())';
			$requestGet = $this->getSql($statement, 'App\app\model\Account', [$username, $password, $level]);
		}

		return $requestGet;
	}

	/** Get a account
	 * @param $data
	 * @return int
	 */
	public function getAccount($data)
	{
		extract($data);
		/** @var string $username */
		/** @var string $password */
		$statement = 'SELECT * FROM accounts WHERE username = ?';
		$request = $this->getSql($statement, 'App\app\model\Account', [$username]);
		$countGet = $request->rowCount();

		if ($countGet === 1) {
			$requestGet = $request->fetch();
			$passwordCheck = password_verify($password, $requestGet->getPass());

			if ($passwordCheck) {
				$_SESSION['id'] = $requestGet->getId();
				$_SESSION['username'] = $requestGet->getUser();
				$_SESSION['level'] = $requestGet->getLevel();
				return $requestGet;
			}
		}
	}
}
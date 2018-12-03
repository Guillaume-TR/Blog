<?php

namespace App\app\manager;


/** Manage the accounts
 * Class AccountManager
 * @package App\app\model
 */
class AccountManager extends DatabaseManager
{
	/** Get all accounts
	 * @return array
	 */
	public function getAllAccounts() {
		$statement = 'SELECT * FROM accounts ORDER BY id DESC';
		$request = $this->getSql($statement, 'App\app\model\Account');
		$requestGet = $request->fetchAll();
		return $requestGet;
	}

	/** Get one account
	 * @param $data
	 * @return int
	 */
	public function getAccount($data) {
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

	/** Add a account
	 * @param $data
	 * @return mixed
	 */
	public function addAccount($data) {
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

	/** Edit a account
	 * @param $data
	 * @return mixed
	 */
	public function editAccount($data) {
		extract($data);
		/** @var string $id */
		$statement = 'SELECT * FROM accounts WHERE id = ?';
		$request = $this->getSql($statement, 'App\app\model\Account', [$id]);
		$countGet = $request->rowCount();
		$requestGet = false;

		if ($countGet === 1) {
			/** @var string $username */
			/** @var string $password */
			$password = password_hash($password);
			$statement = 'UPDATE posts SET title = ?, content = ? WHERE id = ?';
			$requestGet = $this->getSql($statement, 'App\app\model\Account', [$username, $password, $id]);
		}

		return $requestGet;
	}

	/** Delete a account
	 * @param $data
	 * @return mixed
	 */
	public function deleteAccount($data) {
		extract($data);
		/** @var string $id */
		$statement = 'SELECT * FROM accounts WHERE id = ?';
		$request = $this->getSql($statement, 'App\app\model\Account', [$id]);
		$countGet = $request->rowCount();
		$requestGet = false;

		if ($countGet === 1) {
			$statement = 'DELETE FROM accounts WHERE id = ?';
			$requestGet = $this->getSql($statement, 'App\app\model\Account', [$id]);
		}

		return $requestGet;
	}
}
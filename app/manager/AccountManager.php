<?php

namespace App\app\manager;


class AccountManager extends DatabaseManager
{
	public function getAllAccounts() {
		$statement = 'SELECT * FROM accounts ORDER BY id DESC';
		$request = $this->getSql($statement, 'App\app\model\Account');
		$requestGet = $request->fetchAll();
		return $requestGet;
	}

	public function checkAccount($username) {
		$statement = 'SELECT * FROM accounts WHERE username = ?';
		$requestGet = $this->getSql($statement, 'App\app\model\Account', [$username]);
		return $requestGet;
	}

	public function addAccount($data) {
		extract($data);
		/** @var string $username */
		$statement = 'SELECT * FROM accounts WHERE username = ?';
		$request = $this->getSql($statement, 'App\app\model\Account', [$username]);
		$countGet = $request->rowCount();
		$requestGet = false;

		if ($countGet === 0) {
			/** @var string $password */
			/** @var string $level */
			$password = password_hash($password, PASSWORD_DEFAULT);
			$statement = 'INSERT INTO accounts(username, password, level, creation_date) VALUES(?, ?, ?, NOW())';
			$requestGet = $this->getSql($statement, 'App\app\model\Account', [$username, $password, $level]);
		}

		return $requestGet;
	}

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
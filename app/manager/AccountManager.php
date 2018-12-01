<?php

namespace App\app\manager;


class AccountManager extends DatabaseManager
{
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
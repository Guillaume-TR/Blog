<?php

namespace App\app\manager;

use \PDO;
use \Exception;

/** Manage the database
 * Class DatabaseManager
 * @package App\app\model
 */
abstract class DatabaseManager
{
	const DB_HOST = 'host=localhost;';
	const DB_NAME = 'dbname=jf-blog';
	const DB_USER = 'root';
	const DB_PASS = '';
	const PDO_STATEMENT = 'mysql:charset=utf8;' . self::DB_HOST . self::DB_NAME;

	private $dbconnect;

	/** Create the connection instance to the database
	 * @return PDO
	 */
	private function getConnection()
	{
		if ($this->dbconnect === null) {
			try {
				/** @var string $title */
				$db = new PDO(self::PDO_STATEMENT, self::DB_USER, self::DB_PASS);
				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->dbconnect = $db;
			}
			catch (Exception $errorConnection) {
				die('Erreur de connection :' . $errorConnection->getMessage());
			}
		}
		return $this->dbconnect;
	}

	/** Set requete of the database
	 * @param $statement
	 * @param $class
	 * @param null $parameters
	 * @return bool|false|\PDOStatement
	 */
	protected function getSql($statement, $class, $parameters = null) {
		if ($parameters) {
			$db = $this->getConnection()->prepare($statement);
			$db->setFetchMode(PDO::FETCH_CLASS, $class);
			$db->execute($parameters);

			return $db;

		} else {
			$db = $this->getConnection()->query($statement);
			$db->setFetchMode(PDO::FETCH_CLASS, $class);

			return $db;
		}
	}
}
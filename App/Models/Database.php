<?php

namespace App\Models;

class Database
{
    private static $instance;
	private $connection;
	private $host = 'mysql';
	private $username = 'root';
	private $password = 'root';
	private $db = 'test';

    /**
     * Database constructor.
     */
    public function __construct()
    {
		$this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->db);

		// Error handling
		if(mysqli_connect_error()) {
			trigger_error("Failed to connect to MySQL: " . mysql_connect_error(), E_USER_ERROR);
		}
	}

    /**
     * Get an instance of the database
     *
     * @return Database
     */
    public static function getInstance()
	{
	    if(!self::$instance) {
			self::$instance = new self();
		}
		return self::$instance;
	}

    /**
     * Get mysqli connection
     *
     * @return \mysqli
     */
    public function getConnection()
    {
		return $this->connection;
	}

    /**
     * Magic method clone is empty to prevent duplication of connection
     */
    private function __clone()
    {
        //do stuff
    }
}

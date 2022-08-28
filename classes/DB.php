<?php 


class DB
{
	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "finapp";

	public $conn = null;


	//connect to database
	public function getConn()
	{
		try
		{
			$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->database.";charset=utf8mb4", $this->username, $this->password, array(PDO::ATTR_PERSISTENT => false));
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $errMsg)
		{
			echo "An error occurred while trying to extablish connection";
		}

		return $this->conn;
	}

}

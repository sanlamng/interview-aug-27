<?php

class Database
{
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;

    private $statement;
    private $dbHandler;
    private $error;

    public function __construct()
    {

        $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        );

        try {
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    //Allows us to write queries
    public function prepare($sql)
    {
        $this->statement = $this->dbHandler->prepare($sql);
    }

    //Bind params

    public function bind_params($parameter, $value)
    {
        $this->statement->bindParam($parameter, $value);
    }

    //Bind values
    public function bind($parameter, $value, $type = null)
    {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->statement->bindValue($parameter, $value, $type);
    }

    //Execute the prepared statement

    public function beginTransaction()
    {
        return $this->dbHandler->beginTransaction();
    }

    public function commit()
    {
        return $this->dbHandler->commit();
    }

    public function rollback()
    {
        return $this->dbHandler->rollBack();
    }

    public function lastInsertId()
    {
        return $this->dbHandler->lastInsertId();
    }

    public function resultSet($args = array())
    {
        $this->execute($args);
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    //Return an array

    public function execute($args = array())
    {
        return $this->statement->execute($args);
    }

    //Return a specific row as an object

    public function single($args = null)
    {
        is_null($args) ? $this->execute() : $this->execute($args);
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    //Get's the row count
    public function rowCount()
    {
        return $this->statement->rowCount();
    }
}

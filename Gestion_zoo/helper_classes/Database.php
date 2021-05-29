<?php

abstract class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $error;
    private $stmt;

    public function __construct()
    {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname.';charset=utf8';
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_ERRMODE=> PDO::ERRMODE_WARNING
        );
        // Create a new PDO instanace
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }        // Catch any errors
        catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }



    protected function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }


    protected function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
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
        }
        $this->stmt->bindValue($param, $value, $type);
    }


    protected function exec()
    {
        return $this->stmt->execute();
    }


    protected function executeInsert()
    {
        return $this->exec();
    }


    protected function resultset()
    {
       $this->exec();
       $res = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
       $this->stmt->closeCursor();
       return $res;
    }

    protected function singleDelete()
    {
        $this->exec();
        $this->stmt->closeCursor();
    }

    protected function single()
    {
        $this->exec();
        $res = $this->stmt->fetch(PDO::FETCH_OBJ);
        $this->stmt->closeCursor();
        return $res;
    }


    protected function rowCount()
    {
        return $this->stmt->rowCount();
    }


    protected function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }


    protected function beginTransaction()
    {
        return $this->dbh->beginTransaction();
    }


    protected function endTransaction()
    {
        return $this->dbh->commit();
    }


    protected function cancelTransaction()
    {
        return $this->dbh->rollBack();
    }

}

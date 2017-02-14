<?php


class model
{
    //Mysql??
    private $host = "";
    private $user = "";
    private $pass = "";
    private $dbname = "";

    private $dbh;
    private $error;
    private $stmt;

    public function __construct()
    {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        // Create a new PDO instance
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } // Catch any errors
        catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    /*
    **	In order to prepare our SQL queries, we need to bind the inputs with the placeholders we put in place
    **		Param, example :name.
    **		Value, example “John Smith”.
    **		Type, example string.
    */
    public function bind($param, $value, $type = null)
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

    public function single()
    { // The Single method simply returns a single record from the database.
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function execute()
    { // The Execute method executes the prepared statement.
        return $this->stmt->execute();
    }

    public function resultset()
    { // The Result Set function returns an array of the result set rows.
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function rowCount()
    { // The next method simply returns the number of effected rows from the previous delete, update or insert statement.
        return $this->stmt->rowCount();
    }

    /*
    ** TRANSACTIONS
    */
    public function beginTransaction()
    { // Start the transaction
        return $this->dbh->beginTransaction();
    }

    public function endTransaction()
    { // Complete the transaction.
        return $this->dbh->commit();
    }

    public function cancelTransaction()
    { // We fucked up.
        return $this->dbh->rollBack();
    }

    public function lastInsertId()
    { // Returns the last inserted ID.
        return $this->dbh->lastInsertId();
    }

    /*
    ** DEBUG
    */
    public function debugDumpParams()
    { // Did you know a computer program can also barf?
        return $this->stmt->debugDumpParams();
    }
}

?>

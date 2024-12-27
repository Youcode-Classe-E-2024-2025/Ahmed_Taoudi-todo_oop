<?php
require_once("assets/configDB.php");
define('HOST', $host);
define('PORT', $port);
define('DBNAME', $dbname);
define('USER', $user);
define('PASSWORD', $password);

// dd($dsn);
class Database
{
    public $connection;
    private  $dsn;


    public function __construct()
    {
        $this->dsn = "mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DBNAME;

        try {

            $this->connection = new PDO($this->dsn, USER, PASSWORD);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION,PDO::FETCH_ASSOC);
        } catch (PDOException $e) {

            if ($e->getCode() == 1049) {
                echo " info : The database does not exist.<br>";
                echo '<form action=""  method="POST">
                        <button type="submit" name="create_db">Create Database</button>
                      </form>';
            } else {
                // Catch other PDO exceptions
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }

    public function query($query,$param = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($param);
            return $statement;
        } catch (PDOException $e) {

            echo "Query failed: " . $e->getMessage();

        }
    }
public function test(){
    echo("in database class");
}
    public function createDatabase($dbname) {
        try {
            
            $filePath ="assets/database/create_database.sql";
            
            if (!file_exists($filePath)) {
                echo "SQL file not found.";
                return;
            }

            $this->dsn = "mysql:host=" . HOST . ";port=" . PORT;
            $this->connection = new PDO($this->dsn, USER, PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           
            $query = file_get_contents($filePath);
            $this->connection->exec($query);
            echo "Database '$dbname' created successfully.";
            header("Location: /");
        } catch (PDOException $e) {
            echo "Error creating database: " . $e->getMessage();
        }
    }
}


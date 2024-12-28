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

            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {

            if ($e->getCode() == 1049) {
                echo " info : The database does not exist.<br>";
                echo '<form action="/"  method="POST">
                        <label for="checkbox"> with fake data </label>
                        <input id="checkbox" name="checkbox" type="checkbox"> <br>
                        <button type="submit" class="text-white" name="createdb" value="CREATE_DB">Create Database</button>
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
    public function createDatabase($dbname,$isfakedata = false) {
        try {
            
            $createdb ="assets/sql/create_database.sql";
            $fakedata ="assets/sql/fakedata.sql";
            
            if (!file_exists($createdb)) {
                echo "SQL file not found.";
                return;
            }

            $this->dsn = "mysql:host=" . HOST . ";port=" . PORT;
            $this->connection = new PDO($this->dsn, USER, PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           
            $query = file_get_contents($createdb);
            $this->connection->exec($query);
            echo "Database '$dbname' created successfully.";
            if($isfakedata === true){
                $query = file_get_contents($fakedata);
                $this->connection->exec($query);
                echo "fake data success.";
            }
            header("Location: /");
        } catch (PDOException $e) {
            echo "Error creating database: " . $e->getMessage();
        }
    }
    
}


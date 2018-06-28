<?php
/**
 * Database class.
 */
class DB 
{
    private $connection;
    private $app_vars;

    public function __construct($_config_db, $_config_app)
    {
        $this->connection = mysqli_connect($_config_db["host"], $_config_db["user"], $_config_db["pass"], $_config_db["name"]);
        $this->app_vars = $_config_app;

        if (!$this->connection && $this->app_vars["is_debug"]) {
            die("Connection to DB failed. " . mysqli_error($this->connection));
        }

        $this->connection->set_charset($this->app_vars["charset"]);

        return $this->connection;
    }

    public function connection()
    {
        return $this->connection;
    }

    public function queryUsers()
    {
        $query = "SELECT * FROM users";
        $result = mysqli_query($this->connection, $query);

        if (!$result && $this->app_vars["is_debug"]) {
            die("queryUsers() query failed. " . mysqli_error($this->connection));
        }

        return $result;
    }
}

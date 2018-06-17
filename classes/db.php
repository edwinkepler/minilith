<?php
    class DB {
        private $connection;

        function __construct($db_vars) {
            $this->connection = mysqli_connect($db_vars["host"], $db_vars["user"], $db_vars["pass"], $db_vars["name"]);
            if(!$this->connection && $app["is_debug"]) {
                die("Connection to DB failed. " . mysqli_error($this->connection));
            }
        }

        function queryApp() {
            $query = "SELECT * FROM app";
            $result = mysqli_query($this->connection, $query);
            if(!$result && $app["is_debug"]) {
                die("App table query failed. " . mysqli_error($this->connection));
            }
            return mysqli_fetch_assoc($result);
        }
    }
?>

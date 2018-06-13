<?php
    include($_SERVER["DOCUMENT_ROOT"] . APP_PATH . "/config/db.php");

    class DB {
        private $connection;

        function __construct() {
            $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if(!$this->connection && DEBUG) {
                die("Connection to DB failed. " . mysqli_error($this->connection));
            }
        }

        function app() {
            $query = "SELECT * FROM app";
            $result = mysqli_query($this->connection, $query);
            if(!$result && DEBUG) {
                die("App table query failed. " . mysqli_error($this->connection));
            }
            return mysqli_fetch_assoc($result);
        }
    }
?>

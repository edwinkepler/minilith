<?php
    class DB {
        private $connection;
        private $app_vars;

        function __construct($_db_vars, $_app_vars) {
            $this->connection = mysqli_connect($_db_vars["host"], $_db_vars["user"], $_db_vars["pass"], $_db_vars["name"]);
            $this->app_vars = $_app_vars;

            if(!$this->connection && $this->app_vars["is_debug"]) {
                die("Connection to DB failed. " . mysqli_error($this->connection));
            }

            $this->connection->set_charset($this->app_vars["charset"]);
        }

        function queryApp() {
            $query = "SELECT * FROM app";
            $result = mysqli_query($this->connection, $query);
            if(!$result && $this->app_vars["is_debug"]) {
                die("App table query failed. " . mysqli_error($this->connection));
            }
            return mysqli_fetch_assoc($result);
        }

        function queryPosts() {
            $query = "SELECT * FROM posts";
            $result = mysqli_query($this->connection, $query);
            if(!$result && $this->app_vars["is_debug"]) {
                die("Posts table query failed. " . mysqli_error($this->connection));
            }
            return $result;
        }

        function queryPost($_id) {
            $query = "SELECT * FROM posts WHERE id='$_id'";
            $result = mysqli_query($this->connection, $query);
            if(!$result && $this->app_vars["is_debug"]) {
                die("Post table query failed. " . mysqli_error($this->connection));
            }
            return mysqli_fetch_assoc($result);
        }
    }
?>

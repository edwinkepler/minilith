<?php
class DB
{
    private $connection;
    private $config_app;

    function __construct($_config_db, $_config_app)
    {
        $this->connection = mysqli_connect($_config_db['host'], $_config_db['user'], $_config_db['pass'], $_config_db['name']);
        $this->config_app = $_config_app;

        if (!$this->connection && $this->config_app['is_debug']) {
            die('Connection to DB failed. ' . mysqli_error($this->connection));
        }

        $this->connection->set_charset($this->config_app['charset']);
    }

    function queryApp()
    {
        $query = 'SELECT * FROM app';
        $result = mysqli_query($this->connection, $query);
        if (!$result && $this->config_app['is_debug']) {
            die('App table query failed. ' . mysqli_error($this->connection));
        }
        return mysqli_fetch_assoc($result);
    }

    function queryPosts()
    {
        $query = 'SELECT * FROM posts';
        $result = mysqli_query($this->connection, $query);
        if (!$result && $this->config_app['is_debug']) {
            die('Posts table query failed. ' . mysqli_error($this->connection));
        }
        return $result;
    }

    function queryPost($_id)
    {
        $query = "SELECT * FROM posts WHERE id='$_id'";
        $result = mysqli_query($this->connection, $query);
        if (!$result && $this->config_app['is_debug']) {
            die('Post table query failed. ' . mysqli_error($this->connection));
        }
        return mysqli_fetch_assoc($result);
    }
}

<?php
class DB
{
    private $connection;
    private $config_app;

    public function __construct($_config_db, $_config_app)
    {
        $this->connection = mysqli_connect($_config_db['host'], $_config_db['user'], $_config_db['pass'], $_config_db['name']);
        $this->config_app = $_config_app;

        if (!$this->connection && $this->config_app['is_debug']) {
            die('Connection to DB failed. ' . mysqli_error($this->connection));
        }

        $this->connection->set_charset($this->config_app['charset']);
    }

    public function queryApp()
    {
        $query = 'SELECT * FROM app';
        $result = mysqli_query($this->connection, $query);
        if (!$result && $this->config_app['is_debug']) {
            die('App table query failed. ' . mysqli_error($this->connection));
        }
        return mysqli_fetch_assoc($result);
    }

    public function queryPosts()
    {
        $query = 'SELECT * FROM posts';
        $result = mysqli_query($this->connection, $query);
        if (!$result && $this->config_app['is_debug']) {
            die('Posts table query failed. ' . mysqli_error($this->connection));
        }
        return $result;
    }

    public function queryPost($_id)
    {
        $query = "SELECT * FROM posts WHERE id='$_id'";
        $result = mysqli_query($this->connection, $query);
        if (!$result && $this->config_app['is_debug']) {
            die('Posts table query failed. ' . mysqli_error($this->connection));
        }
        return mysqli_fetch_assoc($result);
    }

    public function queryUser($_username)
    {
        $query = "SELECT * FROM users WHERE username='$_username'";
        $result = mysqli_query($this->connection, $query);
        if (!$result && $this->config_app['is_debug']) {
            die('Users table query failed. ' . mysqli_error($this->connection));
        }
        return mysqli_fetch_assoc($result);
    }
}

<?php
class DB
{
    private $connection;
    private $config_app;

    public function __construct(array $_config_db, array $_config_app)
    {
        $this->connection = mysqli_connect($_config_db['host'], $_config_db['user'], $_config_db['pass'], $_config_db['name']);
        $this->config_app = $_config_app;

        if (!$this->connection && $this->config_app['is_debug']) {
            die('Connection to DB failed. ' . mysqli_error($this->connection));
        }

        $this->connection->set_charset($this->config_app['charset']);
    }

    public function queryApp() : array
    {
        $query = 'SELECT * FROM app';
        $result = mysqli_query($this->connection, $query);
        if (!$result && $this->config_app['is_debug']) {
            die('App table query failed. ' . mysqli_error($this->connection));
        }
        return mysqli_fetch_assoc($result);
    }

    public function queryPosts() : mysqli_result
    {
        $query = 'SELECT * FROM posts ORDER BY id DESC';
        $result = mysqli_query($this->connection, $query);
        if (!$result && $this->config_app['is_debug']) {
            die('Posts table query failed. ' . mysqli_error($this->connection));
        }
        return $result;
    }

    public function queryPost(int $_id) : array
    {
        $query = "SELECT * FROM posts WHERE id='$_id'";
        $result = mysqli_query($this->connection, $query);
        if (!$result && $this->config_app['is_debug']) {
            die('Posts table query failed. ' . mysqli_error($this->connection));
        }
        return mysqli_fetch_assoc($result);
    }

    public function queryNextPost(int $_id) : array
    {
        $query = "SELECT COALESCE((SELECT MIN(id) FROM posts WHERE id > '$_id'), (SELECT MIN(id) FROM posts))";
        $result = mysqli_query($this->connection, $query);
        if (!$result && $this->config_app['is_debug']) {
            die('Posts table query failed. ' . mysqli_error($this->connection));
        }
        return mysqli_fetch_row($result);
    }

    public function queryPrevPost(int $_id) : array
    {
        $query = "SELECT COALESCE((SELECT MAX(id) FROM posts WHERE id < '$_id'), (SELECT MAX(id) FROM posts))";
        $result = mysqli_query($this->connection, $query);
        if (!$result && $this->config_app['is_debug']) {
            die('Posts table query failed. ' . mysqli_error($this->connection));
        }
        return mysqli_fetch_row($result);
    }

    public function queryUser(string $_username) : array
    {
        $query = "SELECT * FROM users WHERE username='$_username'";
        $result = mysqli_query($this->connection, $query);
        if (!$result && $this->config_app['is_debug']) {
            die('Users table query failed. ' . mysqli_error($this->connection));
        }
        return mysqli_fetch_assoc($result);
    }
}

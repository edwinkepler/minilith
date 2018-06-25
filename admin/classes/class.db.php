<?php
/**
 * Database class.
 */
class DB 
{
    private $connection;
    private $app_vars;

    public function __construct($_db_vars, $_app_vars)
    {
        $this->connection = mysqli_connect($_db_vars["host"], $_db_vars["user"], $_db_vars["pass"], $_db_vars["name"]);
        $this->app_vars = $_app_vars;

        if (!$this->connection && $this->app_vars["is_debug"]) {
            die("Connection to DB failed. " . mysqli_error($this->connection));
        }

        $this->connection->set_charset($this->app_vars["charset"]);

        return $this->connection;
    }

    public function queryPosts()
    {
        $query = "SELECT * FROM posts";
        $result = mysqli_query($this->connection, $query);

        if (!$result && $this->app_vars["is_debug"]) {
            die("queryPosts() query failed. " . mysqli_error($this->connection));
        }

        return $result;
    }

    public function queryPost($_id)
    {
        $query = "SELECT * FROM posts WHERE id='$_id'";
        $result = mysqli_query($this->connection, $query);

        if (!$result && $this->app_vars["is_debug"]) {
            die("Post table query failed. " . mysqli_error($this->connection));
        }

        return mysqli_fetch_assoc($result);
    }

    public function createPost($_title, $_content, $_excerpt, $_date, $_username, $_filename)
    {
        $_title = mysqli_real_escape_string($this->connection, $_title);
        $_content = mysqli_real_escape_string($this->connection, $_content);
        $_excerpt = mysqli_real_escape_string($this->connection, $_excerpt);
        $_date = mysqli_real_escape_string($this->connection, $_date);
        $_filename = mysqli_real_escape_string($this->connection, $_filename);

        $result = mysqli_query($this->connection, "INSERT INTO posts VALUES (null, '$_title', '$_content', '$_excerpt', '$_date', '$_username', '$_filename')");

        if (!$result && $this->app_vars["is_debug"]) {
            die("createPost() query failed. " . mysqli_error($this->connection));
        }
    }

    public function updatePost($_id, $_title, $_content, $_excerpt, $_date, $_username, $_filename)
    {
        $_title = mysqli_real_escape_string($this->connection, $_title);
        $_content = mysqli_real_escape_string($this->connection, $_content);
        $_excerpt = mysqli_real_escape_string($this->connection, $_excerpt);
        $_date = mysqli_real_escape_string($this->connection, $_date);
        $_filename = mysqli_real_escape_string($this->connection, $_filename);

        $result = mysqli_query($this->connection, "UPDATE posts SET title='$_title', content='$_content', excerpt='$_excerpt', date_published='$_date', author='$_username', image='$_filename' WHERE id='$_id'");

        if (!$result && $this->app_vars["is_debug"]) {
            die("createPost() query failed. " . mysqli_error($this->connection));
        }
    }

    public function deletePost($_id)
    {
        $result = mysqli_query($this->connection, "DELETE FROM posts WHERE id='$_id'");

        if (!$result && $this->app_vars["is_debug"]) {
            die("deletePost() query failed. " . mysqli_error($this->connection));
        }
    }

    public function getPost($_id)
    {
        $query = "SELECT * FROM posts WHERE id='$_id'";
        $result = mysqli_query($this->connection, $query);

        if (!$result && $this->app_vars["is_debug"]) {
            die("getPost() query failed. " . mysqli_error($this->connection));
        }

        return mysqli_fetch_assoc($result);
    }

    public function queryPages()
    {
        $query = "SELECT * FROM pages";
        $result = mysqli_query($this->connection, $query);

        if (!$result && $this->app_vars["is_debug"]) {
            die("queryPages() query failed. " . mysqli_error($this->connection));
        }

        return $result;
    }

    public function createPage($_title, $_content, $_is_published, $_username)
    {
        $_title = mysqli_real_escape_string($this->connection, $_title);
        $_content = mysqli_real_escape_string($this->connection, $_content);

        $result = mysqli_query($this->connection, "INSERT INTO pages VALUES (null, '$_title', '$_content', $_is_published, '$_username')");

        if (!$result && $this->app_vars["is_debug"]) {
            die("createPage() query failed. " . mysqli_error($this->connection));
        }
    }

    public function updatePage($_id, $_title, $_content, $_is_published, $_username)
    {
        $_title = mysqli_real_escape_string($this->connection, $_title);
        $_content = mysqli_real_escape_string($this->connection, $_content);

        $result = mysqli_query($this->connection, "UPDATE pages SET title='$_title', content='$_content', status='$_is_published', author='$_username' WHERE id='$_id'");

        if (!$result && $this->app_vars["is_debug"]) {
            die("updatePage() query failed. " . mysqli_error($this->connection));
        }
    }

    public function getPage($_id)
    {
        $query = "SELECT * FROM pages WHERE id='$_id'";
        $result = mysqli_query($this->connection, $query);

        if (!$result && $this->app_vars["is_debug"]) {
            die("getPage() query failed. " . mysqli_error($this->connection));
        }

        return mysqli_fetch_assoc($result);
    }

    public function deletePage($_id)
    {
        $result = mysqli_query($this->connection, "DELETE FROM pages WHERE id='$_id'");

        if(!$result && $this->app_vars["is_debug"]) {
            die("deletePage() query failed. " . mysqli_error($this->connection));
        }
    }
}
?>

<?php
/**
 * Posts class.
 */
class Posts
{
    private $connection;

    public function __construct($_connection)
    {
        $this->connection = $_connection;
    }

    public function queryPosts(): mysqli_result
    {
        $query = "SELECT * FROM posts";
        $result = mysqli_query($this->connection, $query);

        return $result;
    }

    public function queryPost(int $_id): array
    {
        $query = "SELECT * FROM posts WHERE id='$_id'";
        $result = mysqli_query($this->connection, $query);

        return mysqli_fetch_assoc($result);
    }

    public function createPost(string $_title, string $_content, string $_excerpt, string $_date, string $_username, string $_filename): bool
    {
        $_title = mysqli_real_escape_string($this->connection, $_title);
        $_content = mysqli_real_escape_string($this->connection, $_content);
        $_excerpt = mysqli_real_escape_string($this->connection, $_excerpt);
        $_date = mysqli_real_escape_string($this->connection, $_date);
        $_filename = mysqli_real_escape_string($this->connection, $_filename);

        $result = mysqli_query($this->connection, "INSERT INTO posts VALUES (null, '$_title', '$_content', '$_excerpt', '$_date', '$_username', '$_filename')");

        return $result;
    }

    public function updatePost(int $_id, string $_title, string $_content, string $_excerpt, string $_date, string $_username, string $_filename): bool
    {
        $_title = mysqli_real_escape_string($this->connection, $_title);
        $_content = mysqli_real_escape_string($this->connection, $_content);
        $_excerpt = mysqli_real_escape_string($this->connection, $_excerpt);
        $_date = mysqli_real_escape_string($this->connection, $_date);
        $_filename = mysqli_real_escape_string($this->connection, $_filename);

        $result = mysqli_query($this->connection, "UPDATE posts SET title='$_title', content='$_content', excerpt='$_excerpt', date_published='$_date', author='$_username', image='$_filename' WHERE id='$_id'");

        return $result;
    }

    public function deletePost(int $_id): bool
    {
        $result = mysqli_query($this->connection, "DELETE FROM posts WHERE id='$_id'");

        return $result;
    }

    public function getPost(int $_id): array
    {
        $query = "SELECT * FROM posts WHERE id='$_id'";
        $result = mysqli_query($this->connection, $query);

        return mysqli_fetch_assoc($result);
    }
}

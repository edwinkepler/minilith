<?php
class Pages
{
    private $connection;

    public function __construct($_connection)
    {
        $this->connection = $_connection;
    }

    public function queryPages()
    {
        $query = "SELECT * FROM pages";
        $result = mysqli_query($this->connection, $query);

        return $result;
    }

    public function createPage($_title, $_content, $_is_published, $_username)
    {
        $_title = mysqli_real_escape_string($this->connection, $_title);
        $_content = mysqli_real_escape_string($this->connection, $_content);

        $result = mysqli_query($this->connection, "INSERT INTO pages VALUES (null, '$_title', '$_content', $_is_published, '$_username')");
    }

    public function updatePage($_id, $_title, $_content, $_is_published, $_username)
    {
        $_title = mysqli_real_escape_string($this->connection, $_title);
        $_content = mysqli_real_escape_string($this->connection, $_content);

        $result = mysqli_query($this->connection, "UPDATE pages SET title='$_title', content='$_content', status='$_is_published', author='$_username' WHERE id='$_id'");
    }

    public function getPage($_id)
    {
        $query = "SELECT * FROM pages WHERE id='$_id'";
        $result = mysqli_query($this->connection, $query);

        return mysqli_fetch_assoc($result);
    }

    public function deletePage($_id)
    {
        $result = mysqli_query($this->connection, "DELETE FROM pages WHERE id='$_id'");
    }
}

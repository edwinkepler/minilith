<?php
class Users
{
    private $connection;

    public function __construct($_connection)
    {
        $this->connection = $_connection;
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

    public function queryUser($_id)
    {
        $query = "SELECT * FROM users WHERE id='$_id'";
        $result = mysqli_query($this->connection, $query);

        return mysqli_fetch_assoc($result);
    }

    public function createUser($_username, $_email, $_password, $_avatar)
    {
        $_username = mysqli_real_escape_string($this->connection, $_username);
        $_email = mysqli_real_escape_string($this->connection, $_email);
        $_password = mysqli_real_escape_string($this->connection, $_password);
        $_avatar = mysqli_real_escape_string($this->connection, $_avatar);

        $result = mysqli_query($this->connection, "INSERT INTO users VALUES (null, '$_username', '$_email', '$_password', '$_avatar')");
    }

    public function updateUser($_username, $_email, $_password, $_avatar)
    {
        $_username = mysqli_real_escape_string($this->connection, $_username);
        $_email = mysqli_real_escape_string($this->connection, $_email);
        $_password = mysqli_real_escape_string($this->connection, $_password);
        $_avatar = mysqli_real_escape_string($this->connection, $_avatar);

        $result = mysqli_query($this->connection, "UPDATE users SET username='$_username', email='$_email', password='$_password', avatar='$_avatar')");
    }

    public function deleteUser($_id)
    {
        $result = mysqli_query($this->connection, "DELETE FROM users WHERE id='$_id'");
    }

    public function getUser($_id)
    {
        $query = "SELECT * FROM posts WHERE id='$_id'";
        $result = mysqli_query($this->connection, $query);

        return mysqli_fetch_assoc($result);
    }
}

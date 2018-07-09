<?php
class Users
{
    private $db;

    public function __construct($_db, $_config_app)
    {
        $this->db = $_db;
    }

    public function avatar($_author)
    {
        $post = $this->db->queryUser($_author);
        return $post['avatar'];
    }
}
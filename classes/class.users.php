<?php
class Users
{
    private $db;

    public function __construct(DB $_db, array $_config_app)
    {
        $this->db = $_db;
    }

    public function avatar(string $_author) : string
    {
        $post = $this->db->queryUser($_author);
        return $post['avatar'];
    }
}
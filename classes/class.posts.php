<?php
class Posts
{
    private $db;

    public function __construct($_db)
    {
        $this->db = $_db;
    }

    public function count() : int
    {
        return mysqli_num_rows($this->db->queryPosts());
    }

    public function all()
    {
        return $this->db->queryPosts();
    }

    public function prevId($_id)
    {
        $id = $this->db->queryPrevPost($_id);
        return $id[0];
    }

    public function nextId($_id)
    {
        $id = $this->db->queryNextPost($_id);
        return $id[0];
    }
}

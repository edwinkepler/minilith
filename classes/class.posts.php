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

    public function all() : mysqli_result
    {
        return $this->db->queryPosts();
    }

    public function prevId(int $_id) : int
    {
        $id = $this->db->queryPrevPost($_id);
        return $id[0];
    }

    public function nextId(int $_id) : int
    {
        $id = $this->db->queryNextPost($_id);
        return $id[0];
    }
}

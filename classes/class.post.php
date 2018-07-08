<?php
class Post
{
    private $db;
    private $id;
    private $post;

    public function __construct($_db)
    {
        $this->db = $_db;
    }

    public function setId($_id)
    {
        $this->id = $_id;
    }

    public function title()
    {
        if (isset($this->id)) {
            $post = $this->db->queryPost($this->id);
            return $post['title'];
        }
    }

    public function content()
    {
        if (isset($this->id)) {
            $post = $this->db->queryPost($this->id);
            return $post['content'];
        }
    }

    public function image()
    {
        if (isset($this->id)) {
            $post = $this->db->queryPost($this->id);
            return $post['image'];
        }
    }

    public function author()
    {
        if (isset($this->id)) {
            $post = $this->db->queryPost($this->id);
            return $post['author'];
        }
    }

    public function date()
    {
        if (isset($this->id)) {
            $post = $this->db->queryPost($this->id);
            return $post['date_published'];
        }
    }
}

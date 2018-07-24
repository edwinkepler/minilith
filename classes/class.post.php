<?php
class Post
{
    private $db;
    private $id;
    private $post;

    private $err_msg_no_id = 'You need to set ID of the post.';

    public function __construct(DB $_db)
    {
        $this->db = $_db;
    }

    public function setId(int $_id)
    {
        $this->id = $_id;
        $this->post = $this->db->queryPost($this->id);
    }

    public function id() : string
    {
        if (isset($this->id)) {
            return $this->post['id'];
        } else {
            return $err_msg_no_id;
        }
    }

    public function title() : string
    {
        if (isset($this->id)) {
            return $this->post['title'];
        } else {
            return $err_msg_no_id;
        }
    }

    public function content() : string
    {
        if (isset($this->id)) {
            return $this->post['content'];
        } else {
            return $err_msg_no_id;
        }
    }

    public function image() : string
    {
        if (isset($this->id)) {
            return $this->post['image'];
        } else {
            return $err_msg_no_id;
        }
    }

    public function author() : string
    {
        if (isset($this->id)) {
            return $this->post['author'];
        } else {
            return $err_msg_no_id;
        }
    }

    public function date() : string
    {
        if (isset($this->id)) {
            return $this->post['date_published'];
        } else {
            return $err_msg_no_id;
        }
    }
}

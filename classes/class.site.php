<?php
class Site
{
    private $db;

    public function __construct(DB $_db)
    {
        $this->db = $_db;
    }

    public function language() : string
    {
        $lang = $this->db->queryApp();
        return $lang['language'];
    }

    public function title() : string
    {
        $title = $this->db->queryApp();
        return $title['title'];
    }

    public function description() : string
    {
        $desc = $this->db->queryApp();
        return $desc['description'];
    }

    public function themeName() : string
    {
        $theme_name = $this->db->queryApp();
        return $theme_name['theme'];
    }
}

<?php
class Main
{
    private $db;
    private $theme;
    private $site;
    private $posts;
    private $post;
    private $storage;
    private $users;

    private $is_index = false;
    private $is_post = false;

    /**
     * CSS files array.
     */
    private $css_files = array();
    /**
     * Scripts files array
     */
    private $script_files = array();

    public function __construct($_app_vars)
    {
        require($_SERVER['DOCUMENT_ROOT'] . $_app_vars['path'] . '/classes/class.db.php');
        require($_SERVER['DOCUMENT_ROOT'] . $_app_vars['path'] . '/config/db.php');
        $this->db = new DB($config_db, $_app_vars);

        require($_SERVER['DOCUMENT_ROOT'] . $_app_vars['path'] . '/classes/class.theme.php');
        $this->theme = new Theme($this->db, $_app_vars);

        require($_SERVER['DOCUMENT_ROOT'] . $_app_vars['path'] . '/classes/class.site.php');
        $this->site = new Site($this->db, $_app_vars);

        require($_SERVER['DOCUMENT_ROOT'] . $_app_vars['path'] . '/classes/class.posts.php');
        $this->posts = new Posts($this->db);

        require($_SERVER['DOCUMENT_ROOT'] . $_app_vars['path'] . '/classes/class.post.php');
        $this->post = new Post($this->db);

        require($_SERVER['DOCUMENT_ROOT'] . $_app_vars['path'] . '/classes/class.storage.php');
        $this->storage = new Storage($this->db, $_app_vars);

        require($_SERVER['DOCUMENT_ROOT'] . $_app_vars['path'] . '/classes/class.users.php');
        $this->users = new Users($this->db, $_app_vars);
    }

    public function db() : DB
    {
        return $this->db;
    }

    public function theme() : Theme
    {
        return $this->theme;
    }

    public function site() : Site
    {
        return $this->site;
    }

    public function posts() : Posts
    {
        return $this->posts;
    }

    public function post() : Post
    {
        return $this->post;
    }

    public function storage() : Storage
    {
        return $this->storage;
    }

    public function users() : Users
    {
        return $this->users;
    }

    public function appUrl() : string
    {
        return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    public function itsIndex()
    {
        $this->is_index = true;
    }

    public function isIndex() : bool
    {
        return $this->is_index;
    }

    public function itsPost()
    {
        $this->is_post = true;
    }

    public function isPost() : bool
    {
        return $this->is_post;
    }

    /**
     * Push CSS file to array.
     * 
     * @param string Path to CSS file.
     */
    public function setCss($_link)
    {
        array_push($this->css_files, $_link);
    }

    /**
     * Getter of CSS files.
     * 
     * @return array Array of paths to CSS files.
     */
    public function getCss()
    {
        return $this->css_files;
    }

    /**
     * Push script file to array.
     * 
     * @param string Path to script file.
     */
    public function setScript($_link)
    {
        array_push($this->script_files, $_link);
    }

    /**
     * Getter of script files.
     * 
     * @return array Array of paths to script files.
     */
    public function getScript()
    {
        return $this->script_files;
    }
}

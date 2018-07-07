<?php
class Main {
    private $db;
    private $theme;
    private $site;
    private $posts;
    private $post;
    private $storage;

    public function __construct($_app_vars) {
        require($_SERVER["DOCUMENT_ROOT"] . $_app_vars["path"] . "/classes/class.db.php");
        require($_SERVER["DOCUMENT_ROOT"] . $_app_vars["path"] . "/config/db.php");
        $this->db = new DB($config_db, $_app_vars);

        require($_SERVER["DOCUMENT_ROOT"] . $_app_vars["path"] . "/classes/class.theme.php");
        $this->theme = new Theme($this->db, $_app_vars);

        require($_SERVER["DOCUMENT_ROOT"] . $_app_vars["path"] . "/classes/class.site.php");
        $this->site = new Site($this->db, $_app_vars);

        require($_SERVER["DOCUMENT_ROOT"] . $_app_vars["path"] . "/classes/class.posts.php");
        $this->posts = new Posts($this->db);

        require($_SERVER["DOCUMENT_ROOT"] . $_app_vars["path"] . "/classes/class.post.php");
        $this->post = new Post($this->db);

        require($_SERVER["DOCUMENT_ROOT"] . $_app_vars["path"] . "/classes/class.storage.php");
        $this->storage = new Storage($this->db, $_app_vars);
    }

    public function theme() {
        return $this->theme;
    }

    public function site() {
        return $this->site;
    }

    public function posts() {
        return $this->posts;
    }

    public function post() {
        return $this->post;
    }

    public function storage() {
        return $this->storage;
    }
}

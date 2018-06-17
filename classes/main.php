<?php
    class Main {
        private $db;
        private $theme;
        private $site;
        private $posts;
        private $post;

        public function __construct($_app_vars) {
            require($_SERVER["DOCUMENT_ROOT"] . $_app_vars["path"] . "/classes/db.php");
            include($_SERVER["DOCUMENT_ROOT"] . $_app_vars["path"] . "/config/db.php");
            $this->db = new DB($db, $_app_vars);

            require($_SERVER["DOCUMENT_ROOT"] . $_app_vars["path"] . "/classes/theme.php");
            $this->theme = new Theme($this->db, $_app_vars);

            require($_SERVER["DOCUMENT_ROOT"] . $_app_vars["path"] . "/classes/site.php");
            $this->site = new Site($this->db, $_app_vars);

            require($_SERVER["DOCUMENT_ROOT"] . $_app_vars["path"] . "/classes/posts.php");
            $this->posts = new Posts($this->db);

            require($_SERVER["DOCUMENT_ROOT"] . $_app_vars["path"] . "/classes/post.php");
            $this->post = new Post($this->db);
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
    }
?>

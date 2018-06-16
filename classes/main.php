<?php
    include("config/app.php");

    class Main {
        private $db;
        private $theme;
        private $app;

        public function __construct() {
            require($_SERVER["DOCUMENT_ROOT"] . APP_PATH . "/classes/db.php");
            $this->db = new DB();

            require($_SERVER["DOCUMENT_ROOT"] . APP_PATH . "/classes/theme.php");
            $this->theme = new Theme($this->db);

            require($_SERVER["DOCUMENT_ROOT"] . APP_PATH . "/classes/app.php");
            $this->app = new App($this->db);
        }

        public function theme() {
            return $this->theme;
        }

        public function app() {
            return $this->app;
        }
    }
?>

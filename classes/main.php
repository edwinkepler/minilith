<?php
    class Main {
        private $db;
        private $theme;
        private $app;

        public function __construct($_app_vars) {
            require($_SERVER["DOCUMENT_ROOT"] . $_app_vars["path"] . "/classes/db.php");
            include($_SERVER["DOCUMENT_ROOT"] . $_app_vars["path"] . "/config/db.php");
            $this->db = new DB($db);

            require($_SERVER["DOCUMENT_ROOT"] . $_app_vars["path"] . "/classes/theme.php");
            $this->theme = new Theme($this->db, $_app_vars);

            require($_SERVER["DOCUMENT_ROOT"] . $_app_vars["path"] . "/classes/app.php");
            $this->app = new App($this->db, $_app_vars);
        }

        public function theme() {
            return $this->theme;
        }

        public function app() {
            return $this->app;
        }
    }
?>

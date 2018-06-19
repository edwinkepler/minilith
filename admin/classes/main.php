<?php
    require("../config/app.php");
    require("../config/db.php");
    require("db.php");

    class Main {
        private $db;
        private $config_app;

        public function __construct($_db, $_app) {
            $this->db = new DB($_db, $_app);
        }

        public function db() {
            return $this->db;
        }

        public static function setPageName($_name) {
            define("PAGE_NAME", $_name);
        }

        public static function definePage() {
            define("PAGE", true);
        }
    }
?>

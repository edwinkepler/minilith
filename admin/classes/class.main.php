<?php
    require("../config/app.php");
    require("../config/db.php");
    require("class.db.php");

    class Main {
        private $db;
        private $config_app;
        private $css_files = array();
        private $script_files = array();

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

        public function setCss($_link) {
            array_push($this->css_files, $_link);
        }

        public function getCss() {
            return $this->css_files;
        }

        public function setScript($_link) {
            array_push($this->script_files, $_link);
        }

        public function getScript() {
            return $this->script_files;
        }
    }
?>

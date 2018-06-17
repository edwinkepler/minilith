<?php
    class Theme {
        private $db;
        private $app_vars;

        public function __construct($_db, $_app_vars) {
            $this->db = $_db;
            $this->app_vars = $_app_vars;
        }

        public function getThemeUrl() {
            $app_query = $this->db->queryApp();

            if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on") {
                $protocol = "http://"; 
            } else {
                $protocol = "https://"; 
            }

            return $protocol . $_SERVER["HTTP_HOST"] . $this->app_vars["path"] . "/themes/" . $app_query["theme"];
        }
    }
?>

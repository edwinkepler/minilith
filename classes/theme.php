<?php
    class Theme {
        private $db;

        public function __construct($db) {
            $this->db = $db;
        }

        public function getThemeUrl() {
            $app_query = $this->db->queryApp();

            if (!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on") {
                $protocol = "http://"; 
            } else {
                $protocol = "https://"; 
            }

            return $protocol . $_SERVER["HTTP_HOST"] . APP_PATH . "/themes/" . $app_query["theme"];
        }
    }
?>

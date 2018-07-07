<?php
    class Site {
        private $db;

        public function __construct($_db) {
            $this->db = $_db;
        }

        public function language() {
            $lang = $this->db->queryApp();
            return $lang["language"];
        }

        public function title() {
            $title = $this->db->queryApp();
            return $title["title"];
        }

        public function description() {
            $desc = $this->db->queryApp();
            return $desc["descryption"];
        }

        public function themeName() {
            $theme_name = $this->db->queryApp();
            return $theme_name["theme"];
        }
    }
?>

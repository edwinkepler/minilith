<?php
    class App {
        private $db;

        public function __construct($_db) {
            $this->db = $_db;
        }

        public function getLanguage() {
            $lang = $this->db->queryApp();
            return $lang["language"];
        }

        public function getTitle() {
            $title = $this->db->queryApp();
            return $title["title"];
        }

        public function getDescryption() {
            $desc = $this->db->queryApp();
            return $desc["descryption"];
        }

        public function getThemeName() {
            $theme_name = $this->db->queryApp();
            return $theme_name["theme"];
        }
    }
?>

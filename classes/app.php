<?php
    class App {
        private $db;

        public function __construct($db) {
            $this->db = $db;
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

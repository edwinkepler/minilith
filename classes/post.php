<?php
    class Post {
        private $db;
        private $id;

        public function __construct($_db) {
            $this->db = $_db;
        }

        public function setId($_id) {
            $this->id = $_id;
        }

        public function title() {
            if(isset($this->id)) {
                $post = $this->db->queryPost($this->id);
                return $post["title"];
            }
        }
    }
?>

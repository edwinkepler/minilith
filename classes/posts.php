<?php
    class Posts {
        private $db;

        public function __construct($_db) {
            $this->db = $_db;
        }

        public function count() {
            return mysqli_num_rows($this->db->queryPosts());
        }

        public function all() {
            return $this->db->queryPosts();
        }
    }
?>

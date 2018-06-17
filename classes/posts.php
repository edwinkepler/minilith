<?php
    class Posts {
        private $db;

        public function __construct($_db) {
            $this->db = $_db;
        }

        public function getNumOfPosts() {
            return mysqli_num_rows($this->db->queryPosts());
        }
    }
?>

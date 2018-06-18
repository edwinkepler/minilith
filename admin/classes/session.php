<?php
    class Session {
        public static function start() {
            ob_start();
            session_start();
        }

        public static function check($_redirecto_to) {
            if(!isset($_SESSION["username"]) || !isset($_SESSION["logged_in"])) {
                header("Location: " . $_redirecto_to);
            }
        }
    }
?>

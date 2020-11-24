<?php

    class nc_utils_base {
        private static $m_pInstance;

        public static function instance() {
            if(self::$m_pInstance == null)
                self::$m_pInstance = new nc_utils_base();
            return self::$m_pInstance;
        }
        public function get($key, $alt = "", $filter = FILTER_SANITIZE_STRING) {
            $getvar = isset($_GET[$key]) ? $_GET[$key] : $alt;

            return $this->filter($getvar, $filter);
        }

        public function set($key, $value, $filter = FILTER_SANITIZE_STRING) {
            $_GET[$key] = $this->filter($value, $filter);
        }

        public function get_session($key, $alt = "", $filter = FILTER_SANITIZE_STRING) {
            $getvar = isset($_SESSION[$key]) ? $_SESSION[$key] : $alt;

            return $this->filter($getvar, $filter);
        }

        public function set_session($key, $value, $filter = FILTER_SANITIZE_STRING) {
            $_SESSION[$key] = $this->filter($value, $filter);
        }

        public function post($key, $alt = "", $filter = FILTER_SANITIZE_STRING) {
            $getvar = isset($_POST[$key]) ? $_POST[$key] : $alt;

            return $this->filter($getvar, $filter);
        }

        public function filter($getvar, $filter = FILTER_SANITIZE_STRING) {
            return filter_var($getvar, $filter);
        }
    };


?>
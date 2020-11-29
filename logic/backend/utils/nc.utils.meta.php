<?php

    class nc_utils_meta { 
        private static $m_pInstance;

        private function __construct() {
            $this->m_arrayCSS = [ 'bootstrap.css'];

            $this->m_arrayJS = [ 'jquery.slim.min.js',
                                 'bootstrap.bundle.min.js', 
                                 'auti.utils.min.js' ];
        }
        public static function instance() {
            if(self::$m_pInstance == null)
                self::$m_pInstance = new nc_utils_meta();
            return self::$m_pInstance;
        }

        public function get_meta_css_string() {
            $ret_css_string = "";

            foreach($this->m_arrayCSS as $item) {
                $ret_css_string .= $this->get_css($item);
            }
            return $ret_css_string;
        }

        public function get_meta_js_string() {
            $ret_js_string = "";

            foreach($this->m_arrayJS as $item) {
                $ret_js_string .= $this->get_js($item);
            }
            return $ret_js_string;
        }
        
        public function get_css($file) {
            $return = null;
            $_date = null;
            $_file = "dyn_assets/css/$file";

            if(file_exists($_file)) {
                $_date = filemtime($_file);
                $return = "<link href=\"$_file?v=$_date\" rel=\"stylesheet\">\n";
            } else {
                $return = "\n";
            }
            return $return;
        }

        public function get_js($file, $ext = "") {
            $return = null;
            $_date = null;
            $_file = "dyn_assets/js/$file";

            if(file_exists($_file)) {
                $_date = filemtime($_file);
                $return = "<script src=\"$_file?v=$_date\" $ext></script>\n";
            } else {
                $return = "\n";
            }
            return $return;
        }
        private $m_arrayCSS;
        private $m_arrayJS;
    };
?>
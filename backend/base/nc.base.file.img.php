<?php
    require_once dirname(__FILE__) . '/nc.base.file.php';

    class nc_base_file_img extends nc_base_file {
        public function __construct($file, $altText) {
            nc_base_file::__construct($file);
            $this->m_strAltText =  $altText;
        }
        public function get_alt_text() {
            return $this->m_strAltText;
        }
        public function get_img($class) {
            return '<img src="'.$this->get_file().'" alt="'.$this->m_strAltText.'" class="'.$class.'">';
        }
        private $m_strAltText;
    };
?>
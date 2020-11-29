<?php 
    require_once dirname(__FILE__) . '/nc.base.file.php';

    class nc_base_vfile extends nc_base_file {
        public function __construct($stringText, $mimeInfo, $parent) {
            nc_base_file::__construct(null, $parent);

            $this->m_stringContent = $stringText;
            $this->m_mimeInfo = $mimeInfo;
            $this->m_dateNow = time();
        }

        public function get_file() { 
            return "noSqlvTemp";
        }

        public function get_contents() {
            return $this->m_stringContent;
        }

        public function set_contents($string, $offset = 0) {
            $this->m_stringContent = $string;
        }

        public function exists() {
            return true;
        }

        public function get_mtime() {
            return $this->m_dateNow;
        }

        public function get_ctime() {
            return $this->m_dateNow;
        }

        public function get_atime() {
            return $this->m_dateNow;
        }

        public function get_mime() {
            return $this->m_mimeInfo;
        }

        protected $m_dateNow;
        protected $m_mimeInfo;
        protected $m_stringContent;

    };
?>
<?php 
    require_once "backend/base/nc.base.class.php";

    class nc_base_file extends nc_object {
        public function __construct($file) {

            if(file_exists($file) OR $file == "")
                $this->m_strFile = $file;
            else 
                throw new Exception("file $file not found");
        }

        public function get_file() { 
            return $this->m_strFile; 
        }
        public function get_contents($use_include = false) {
            return file_get_contents($this->m_strFile, $use_include);
        }
        public function set_contents($date) {
            return file_put_contents($this->m_strFile, $date);
        }
        public function exists() {
            return file_exists($this->m_strFile);
        }
        public function get_mtime() {
            return filemtime($this->get_file());
        }
        public function get_ctime() {
            return filectime($this->get_file());
        }
        public function get_atime() {
            return fileatime($this->get_file());
        }
        public function get_mime() {
            return mime_content_type($this->m_strFile);
        }

        public function to_string() {
            $parent = nc_object::parents($this);
            $class =__CLASS__;
            return "[[$class]:$parent] name $this->m_strName";
        }

        protected $m_strFile;
    };
?>
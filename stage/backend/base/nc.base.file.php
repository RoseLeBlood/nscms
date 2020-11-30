<?php 
    require_once dirname(__FILE__) . '/nc.base.class.php';

    class nc_base_file extends nc_object {
        public function __construct($file, $parent) {
            nc_object::__construct($parent);

            if($file != null) {
                $this->m_strFile = $file;
                
                if(!file_exists($this->m_strFile))
                    $this->error('Unable to open file! ('.$this->get_file().'.');
            }
        }

        public function get_file() { 
            return $this->m_strFile; 
        }
        public function get_contents() {
            $_fFile = fopen($this->get_file(), "r") or 
                $this->error('Unable to open file! ('.$this->get_file().'.');
                
                $_fileContent = fread($_fFile, filesize($this->get_file()));
                fclose($_fFile);

            return $_fileContent;
        }
        public function set_contents($string, $offset = 0) {
            $_fFile = fopen($this->get_file(), "rw") or 
                $this->error('Unable to open file! ('.$this->get_file().'.');
            
                fseek($_fFile, $offset);
                fwrite($_fFile, $string);

            fclose($_fFile);
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
        protected function error($text) {

            die("[_object] Error: $text <br>");
        }


        protected $m_strFile;
        protected $m_fileContent;
    };
?>
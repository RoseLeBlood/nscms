<?php 
    abstract class nc_visual_object {
        public function __construct($nc_file_object) {
            $this->m_ncFileObject = $nc_file_object;
            $this->m_fileContent = $this->m_ncFileObject->get_contens();
        }
        public function reset() {
            $this->m_fileContent = $this->m_ncFileObject->get_contens();
        }

        public function set_variable($varible, $text) {
            $this->m_fileContent = str_replace("{_%_".$varible."_%_}", $text, $this->m_fileContent);
        }
        public function get_content() {
            return $this->m_fileContent;
        }
        public function setAndRender() {
            $this->setvar();
            return $this->render();
        }

        public abstract function setvar();
        public abstract function render(); 

        protected $m_ncFileObject;
        protected $m_fileContent;
    };

    class nc_visual_downloadeble extends nc_visual_object {
        public function __construct($nc_file_object, $fileName) { 
            nc_visual_object::__construct($nc_file_object);
            $this->m_strFilename = $fileName;
        }
        public function setvar() {

        }
        public function render() {
            $mime = $this->m_ncFileObject->get_mime();
            header('Content-Type: "'.$mime.'"');
            header('Content-Disposition: attachment; filename="' . $this->m_strFilename . '"');
            
            return $this->get_content();
        }

        protected $m_strFilename;
    };


?>
<?php 
    require_once dirname(__FILE__) . '/nc.base.file.php';
    require_once dirname(__FILE__) . '/../extern/php-markdown/Michelf/MarkdownExtra.inc.php';

    use Michelf\Markdown;
    use Michelf\MarkdownExtra;

    class nc_base_file_md extends nc_base_file {
        public function __construct($file) {
            nc_base_file::__construct($file);
        } 
        public function get_html($len = -1) {
            $contents = $this->get_contens();
            if($len != -1) $contents = substr($contents, 0, $len);
            
            return Markdown::defaultTransform($contents); 
        }
        public function get_html_extra($len = -1) {
            $contents = $this->get_contens();
            if($len != -1) $contents = substr($contents, 0, $len);
            
            return MarkdownExtra::defaultTransform($contents); 
        }
        public function to_string() {
            $parent = nc_object::parents($this);
            $class =__CLASS__;
            $file = $this->get_file();

            return "[$class:$parent] $file";
        }
    };
?>
<?php 
    require_once dirname(__FILE__) . '/nc.base.visual.php';
    require_once dirname(__FILE__) . '/../extern/php-markdown/Michelf/MarkdownExtra.inc.php';

    use Michelf\Markdown;
    use Michelf\MarkdownExtra;

    class nc_visual_md extends nc_visual_object {
        public function __construct($file) {
            nc_visual_object::__construct($file);
        } 
        public function setvar() { 
            
        }
        public function render() {
            return Markdown::defaultTransform($this->m_fileContent);
        }
    };
?>
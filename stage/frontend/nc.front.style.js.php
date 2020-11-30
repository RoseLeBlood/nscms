<?php 
    require_once dirname(__FILE__) . '/../backend/base/nc.base.visual.site.mod.php';

    class nc_front_js_css extends nc_visual_site_mod {
        public function __construct($parent) {
            nc_visual_site_mod::__construct(null, $parent);
        }

        public function setvar() {
            nc_visual_site_mod::setvar();

            foreach(NC_SKIN_CSS as $item) {
                $file = $this->get_file($item, "css");
                
                $path = $file->get_file();
                $time = $file->get_mtime();

                $this->m_fileContent .=  "\n\t\t<link href=\"$path?v=$time\" rel=\"stylesheet\">";
            }

            foreach(NC_SKIN_JS as $item) {
                $file = $this->get_file($item, "js");

                $path = $file->get_file();
                $time = $file->get_mtime();

                $this->m_fileContent .=  "\n\t\t<script src=\"$path?v=$time\"></script>";
            }
        }
        private function get_file($file, $subdir) {
            $path = NC_HTML_PATH . "/$subdir/$file";
            if(!file_exists($path))
                $path = NC_SKIN_BASE_PATH . "/$subdir/$file";
            return new nc_base_file($path, null);
        }
    };
?>
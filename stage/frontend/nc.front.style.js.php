<?php 
    require_once dirname(__FILE__) . '/../backend/base/nc.base.visual.site.mod.php';

    class nc_front_js_css extends nc_visual_site_mod {
        public function __construct($parent) {
            nc_visual_site_mod::__construct(null, $parent);
        }

        public function setvar() {
            nc_visual_site_mod::setvar();

            foreach(NC_SKIN_CSS as $item) {
                $path = $this->get_file($item, "css");
                $this->m_fileContent .=  "<link href=\"$path\" rel=\"stylesheet\">\n";
            }

            foreach(NC_SKIN_JS as $item) {
                $path = $this->get_file($item, "js");
                $this->m_fileContent .=  "<script src=\"$path\"></script>\n";
            }
        }
        private function get_file($file, $subdir) {
            $path = NC_HTML_PATH . "/$subdir/$file";
            if(!file_exists($path))
                $path = NC_SKIN_BASE_PATH . "/$subdir/$file";
            return $path;
        }
    };
?>
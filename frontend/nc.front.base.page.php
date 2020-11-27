<?php 
    require_once "backend/base/nc.base.visual.site.php";

    require_once dirname(__FILE__) . '/logic/nc.frontend.mod.bright.php';

    require_once dirname(__FILE__) . "/nc.front.aseid.php";
    require_once dirname(__FILE__) . "/nc.front.navbar.php";    
    require_once dirname(__FILE__) . "/nc.front.footer.php";
    require_once dirname(__FILE__) . '/nc.front.meta.php';

    class nc_front_base extends nc_visual_site {
        public function __construct($content, $metaClass, $title)   {
            nc_visual_site::__construct("nc.page.main.htm", $title);

            $this->add_module("NC_SITE_MODULE_MAIN_CONTENT",    $content );
            $this->add_module("NC_SITE_MODULE_META",            $metaClass );
            
            $this->add_module("NC_SITE_MODULE_ASIDE",           new nc_front_aseid($this) );
            $this->add_module("NC_SITE_MODULE_HEADER",          new nc_front_navbar($this) );
            $this->add_module("NC_SITE_MODULE_FOOTER",          new nc_front_footer($this) );
        }

        public function setvar() {
            nc_visual_site::setvar();  
        }
    };
?>
<?php 
    require_once dirname(__FILE__) . '/../backend/base/nc.base.visual.site.php';

    require_once dirname(__FILE__) . '/logic/nc.frontend.mod.bright.php';

    require_once dirname(__FILE__) . "/nc.front.aseid.php";
    require_once dirname(__FILE__) . "/nc.front.navbar.php";    
    require_once dirname(__FILE__) . "/nc.front.footer.php";
    require_once dirname(__FILE__) . '/nc.front.meta.php';
    require_once dirname(__FILE__) . '/nc.front.style.js.php';

    class nc_front_base extends nc_visual_site {
        public function __construct($content, $metaClass, $title, $parent, $aside = true)   {
            nc_visual_site::__construct($aside ? "nc.page.main.htm" : "nc.page.main.alt.htm", $title, $parent);

            $this->add_module("NC_SITE_MODULE_MAIN_CONTENT",    $content );
            $this->add_module("NC_SITE_MODULE_META",            $metaClass );
            
            if($aside)
                $this->add_module("NC_SITE_MODULE_ASIDE",       new nc_front_aseid($this)  );
        
            $this->add_module("NC_SITE_MODULE_HEADER",          new nc_front_navbar($this) );
            $this->add_module("NC_SITE_MODULE_FOOTER",          new nc_front_footer($this) );
            $this->add_module("NC_SITE_MODULE_CSS_JS",          new nc_front_js_css($this) );
        }

        public function setvar() {
            nc_visual_site::setvar();
            
            $this->set_variable("NC_SITE_LANG",              NC_SITE_LANG);
            $this->set_variable("NC_SITE_DIR",               NC_SITE_DIR);
        }
    };
?>
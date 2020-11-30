<?php 

    require_once "stage/backend/config/nc.config.php";
    require_once "stage/frontend/nc.front.base.page.php";
    require_once "stage/frontend/nc.front.blog.content.php";

    require_once "stage/frontend/nc.front.style.js.php";

    class nc_front_main extends nc_visual_site {

        public function __construct($nameOfMod)   {
            nc_visual_site::__construct("nc.page.debug.mod.test.htm", "", $this);

            $this->add_module("NC_SITE_MODULE_MAIN_CONTENT", new nc_module_visual_bright($nameOfMod, $this)  );
            $this->add_module("NC_SITE_MODULE_CSS_JS",       new nc_front_js_css($this) );
        }

        public function setvar() {
            nc_visual_site::setvar();  

            $mod = $this->get_module('NC_SITE_MODULE_MAIN_CONTENT');
            $this->set_variable('NC_SITE_MODULE_TEST_NAME', $mod->get_name() );
        }
    };

    $site = new nc_front_main("Link-view-wigdet");
    echo $site->setAndRender();
?>

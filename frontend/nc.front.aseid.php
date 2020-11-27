<?php 
    require_once "backend/base/nc.base.visual.site.mod.php";

    class nc_front_aseid extends nc_visual_site_mod {
        public function __construct($parent) {
            nc_visual_site_mod::__construct("nc.page.aside.htm", $parent);

            // TODO: This part set in json file
            //$this->add_module("NC_WIDGET_ONE", new nc_module_visual_bright("about-view-wigdet") );
            //$this->add_module("NC_WIDGET_TWO", new nc_module_visual_bright("archiv-view-wigdet") );
            $this->add_module("NC_WIDGET_THREE", new nc_module_visual_bright("Link-view-wigdet") );
        }
    };

?>
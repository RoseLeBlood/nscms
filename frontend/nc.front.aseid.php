<?php 
    require_once "backend/base/nc.base.visual.site.php";

    class nc_front_aseid extends nc_visual_site {
        public function __construct() {
            nc_visual_site::__construct("nc.page.aside.htm", "aside");

            // TODO: This part set in json file
            //$this->add_module("NC_WIDGET_ONE", new nc_module_visual_bright("about-view-wigdet") );
            //$this->add_module("NC_WIDGET_TWO", new nc_module_visual_bright("archiv-view-wigdet") );
            $this->add_module("NC_WIDGET_THREE", new nc_module_visual_bright("Link-view-wigdet") );
        }
    };

?>
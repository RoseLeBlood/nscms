<?php 
    require_once "backend/base/nc.base.visual.site.php";

    class nc_front_aseid extends nc_visual_site {
        public function __construct() {
            nc_visual_site::__construct("nc.page.aside.htm", "aside");
        }

        public function setvar() {

        }
        public function render() {
            return $this->get_content();
        }
    };

?>
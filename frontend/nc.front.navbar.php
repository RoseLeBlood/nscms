<?php 
    require_once "backend/base/nc.base.visual.site.php";

    class nc_front_navbar extends nc_visual_site {
        public function __construct() {
            nc_visual_site::__construct("nc.page.navbar.htm", "navbar");
        }

        public function setvar() {
            $this->set_variable("NC_SITE_TITLE", NC_SITE_TILTE); 
            $this->set_variable("NC_SITE_SUB_TITLE", NC_SITE_SUBTITLE);
        }
        public function render() {
            return $this->get_content();
        }
    };

?>
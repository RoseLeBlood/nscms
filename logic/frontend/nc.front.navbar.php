<?php 
    require_once dirname(__FILE__) . '/../backend/base/nc.base.visual.site.mod.php';

    class nc_front_navbar extends nc_visual_site_mod {
        public function __construct($parent) {
            nc_visual_site_mod::__construct("nc.page.navbar.htm", $parent);
        }

        public function setvar() {
            nc_visual_site_mod::setvar();

            $this->set_variable("NC_SITE_TITLE", NC_SITE_TILTE); 
            $this->set_variable("NC_SITE_SUB_TITLE", NC_SITE_SUBTITLE);
        }
    };

?>
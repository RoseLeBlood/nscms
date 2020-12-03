<?php 
    require_once dirname(__FILE__) . '/../backend/base/nc.base.visual.site.mod.php';

    class nc_front_contact_content extends nc_visual_site_mod {
        public function __construct($parent) {
            nc_visual_site_mod::__construct("nc.page.main.contact.htm", $parent);
        }
    };


?>
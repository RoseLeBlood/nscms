<?php 
    require_once "backend/base/nc.base.visual.site.mod.php";

    class nc_front_blog_content extends nc_visual_site_mod {
        public function __construct($parent) {
            nc_visual_site_mod::__construct("nc.page.main.content.htm", $parent);
        }
    };

?>
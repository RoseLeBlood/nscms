<?php 
    require_once dirname(__FILE__) . '/../backend/base/nc.base.visual.site.mod.php';

    class nc_front_meta_infos extends nc_visual_site_mod {
        public function __construct($parent) {
            nc_visual_site_mod::__construct("nc.page.meta.htm", $parent);
        }

        public function setvar() {
            nc_visual_site_mod::setvar();

            $this->set_variable("NC_SITE_TITLE",              NC_SITE_TITLE);
            $this->set_variable("NC_SITE_DESCRIPTION",        NC_SITE_DESC);
            $this->set_variable("NC_SITE_KEYWORDS",           NC_SITE_KEYWORDS);
            $this->set_variable("NC_SITE_META_ROBOTS",        NC_ROBOTS_PROPERTY);
            $this->set_variable("NC_SITE_META_REVISIT_AFTER", NC_ROBOTS_REVISIT_AFTER);

            $this->set_variable("NC_SITE_META_TITLE_COLOR",   NC_MOBILE_TILE_COLOR);
            $this->set_variable("NC_SITE_META_TITLE_IMAGE",   NC_MOBILE_TILE_IMAGE);
            $this->set_variable("NC_SITE_META_WEBMANIFEST",   NC_MOBILE_MANIFEST);
            $this->set_variable("NC_SITE_META_IMAGE180",      NC_ICONS_IMAGE180);
            $this->set_variable("NC_SITE_META_IMAGE96",       NC_ICONS_IMAGE96);
            $this->set_variable("NC_SITE_META_IMAGE32",       NC_ICONS_IMAGE32);
            $this->set_variable("NC_SITE_META_FAVICON",       NC_ICONS_FAVICON);
        }
        
    };

?>
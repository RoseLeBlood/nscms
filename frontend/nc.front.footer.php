<?php 
    require_once "backend/base/nc.base.visual.site.php";

    class nc_front_footer extends nc_visual_site {
        public function __construct() {
            nc_visual_site::__construct("nc.page.footer.htm", "footer");
        }

        public function setvar() {
        }
        public function render() {
            return $this->get_content();
        }
    };

?>
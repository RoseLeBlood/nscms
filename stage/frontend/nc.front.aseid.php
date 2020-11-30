<?php 

    require_once dirname(__FILE__) . '/../backend/base/nc.base.visual.site.mod.php';
    require_once dirname(__FILE__) .  '/logic/nc.frontend.menus.php';

    class nc_front_aseid extends nc_visual_site_mod {
        public function __construct($parent) {
            nc_visual_site_mod::__construct("nc.page.aside.htm", $parent);

            $inst = nc_frontend_menus_db::instance()->make("aside");
            
            foreach($inst as $item) {
                $content = $item->get_content();
                $var = $item->get_variable();

                $this->add_module($var,  new nc_module_visual_bright($content, $this) );
            }
        }
    };

?>
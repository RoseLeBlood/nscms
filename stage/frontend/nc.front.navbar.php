<?php 
    require_once dirname(__FILE__) . '/../backend/base/nc.base.visual.site.mod.php';
    require_once dirname(__FILE__) .  '/logic/nc.frontend.menus.php';

    class nc_front_navbar_link extends nc_visual_site_mod {
        public function __construct($item) {
            nc_visual_site_mod::__construct("nc.page.navbar.item.htm", null);
            $this->m_text = $item->get_text();
            $this->m_link = $item->get_link();
            $this->m_icon = $item->get_icon();
            $this->m_aria = $item->get_aria();
        }
        public function setvar() {
            nc_visual_site_mod::setvar();
         
            $file = pathinfo($this->m_link, PATHINFO_FILENAME);

            if($file == NC_CURRENT_SITE) {
                $this->set_variable("NC_NAVBAR_ITEMS_LINK_CURRENT", "(current)");
                $this->set_variable("NC_NAVBAR_ITEMS_LINK_ACTIVE",  "active");
            } else {
                $this->set_variable("NC_NAVBAR_ITEMS_LINK_CURRENT", "");
                $this->set_variable("NC_NAVBAR_ITEMS_LINK_ACTIVE",  "");
            }
            
            $this->set_variable("NC_NAVBAR_ITEM_LINK_NAME",     $this->m_text); 
            $this->set_variable("NC_NAVBAR_ITEM_LINK",          $this->m_link); 
            $this->set_variable("NC_NAVBAR_ITEMS_LINK_ARIA",    $this->m_aria); 
            $this->set_variable("NC_NAVBAR_ITEM_LINK_FA_FONT",  $this->m_icon); 

            //NC_NAVBAR_ITEMS_LINK_CURRENT2 NC_NAVBAR_ITEMS_LINK_CURRENT
        }

        private $m_text;
        private $m_link;
        private $m_icon;
        private $m_aria;
    };

    class nc_front_navbar extends nc_visual_site_mod {
        public function __construct($parent) {
            nc_visual_site_mod::__construct("nc.page.navbar.htm", $parent);
            $inst = nc_frontend_menus_db::instance()->make("hmenu");

            foreach($inst as $item) {
                $this->m_arrayMenu[] = new nc_front_navbar_link($item, null);
            }
        }

        public function setvar() {
            nc_visual_site_mod::setvar();

            foreach($this->m_arrayMenu as $item) {
                $item->setvar();
            }

            $this->set_variable("NC_SITE_TITLE", NC_SITE_TITLE); 
            $this->set_variable("NC_SITE_SUB_TITLE", NC_SITE_DESC);
        }
        public function render() {
            nc_visual_site_mod::render();

            $content = "";
            foreach($this->m_arrayMenu as $item) {
                $content .= $item->render() . "\n";
            }

            $this->set_variable("NC_NAVBAR_ITEMS", $content);
            
            return $this->get_content();
        }
        
        private $m_arrayMenu;
    };

?>
<?php 
    require_once dirname(__FILE__) . '/../../backend/base/nc.base.db.php';

    require_once dirname(__FILE__) . '/nc.frontend.menu.base.php';
    require_once dirname(__FILE__) . '/nc.frontend.menu.link.php';
    require_once dirname(__FILE__) . '/nc.frontend.menu.widget.php';

    class nc_frontend_menus_db extends nc_base_db {
        private static $m_instance = null;

        private function __construct($assoc = true, $depth = 30, $options = 0) {
            nc_base_db::__construct("menu", $assoc, $depth, $options);
        }
        public static function instance() {
            if(self::$m_instance == null)
                self::$m_instance = new  nc_frontend_menus_db();
            return self::$m_instance;
        }
        
        public function make($menu) {
            $arrayMenu = array();
            $rawMenu = $this->m_arrayItems[0][$menu];

            foreach($rawMenu as $item) {
                if($item["type"] == "widget")
                    $arrayMenu[] = new nc_frontend_menu_widget($item["args"], $this); 
                else if($item["type"] == "link") 
                    $arrayMenu[] = new nc_frontend_menu_link($item["args"], $this); 
                
            }
            return $arrayMenu;
        }

        protected $m_arrayTypes;
    };


?>
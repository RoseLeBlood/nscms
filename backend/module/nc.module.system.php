<?php 

    require_once "backend/module/nc.module.ressourcen.list.php";

    class nc_module_system extends nc_object {
        private static $m_pInstance;

        public static function instance() {
            if(self::$m_pInstance == null) 
                self::$m_pInstance = new nc_module_system();
            return self::$m_pInstance;
        }
        private function __construct() {
            $this->m_ncRessourcenList = new nc_module_ressourcen_list();
            $this->m_ncLoadedModules = array();
        }

        public function to_string() {
            $_nums = implode('-', $this->get_nums() );

            return '[nc_module_system] ' . $_nums;
        }

        public function get_ressourcen_list() {
            return $this->m_ncRessourcenList;
        }
        public function add_configs($bDebug = false) {
            $_list = $this->m_ncRessourcenList;

            for($i = 0; $i < $_list->get_count(); $i++) {
                $_item = $_list->get_item($i); 
                if($_item->is_active() AND $_item->use_config()) {
                    require_once $_item->get_config_path();

                    if($bDebug) echo $_item->get_config_path() . '\n';
                }
            }
        }
        public function get_nums() {
            $_aktive = 0; $_disable = 0;

            $_list = $this->m_ncRessourcenList;

            for($i = 0; $i < $_list->get_count(); $i++) {
                if($_item->is_active()) $_aktive++;
                else $_disable++;
            }
            return ['active' => $_aktive, 
                    'disable' => $_disable, 
                    'sum' => $_aktive + $_disable,
                    'loaded' => count($this->m_ncLoadedModules) ];
        }
        public function get_names($onlyActive = true) {
            $_arrafOfName = array();

            $_list = $this->m_ncRessourcenList;

            for($i = 0; $i < $_list->get_count(); $i++) {
                if($onlyActive AND $_item->is_active()) {
                    array_push($_arrafOfName, $_list->get_name());
                } else {
                    array_push($_arrafOfName, $_list->get_name());
                }
            }
            return $_arrafOfName;
        }
        public function get_object($name) {
            if(!isset($this->m_ncLoadedModules[$name]))  {

                $_list = $this->m_ncRessourcenList;

                for($i = 0; $i < $_list->get_count(); $i++) {
                    $_item = $_list->get_item($i); 
                    if($_item->get_name() == $name AND $_item->is_active()) {
                        require_once $_item->get_class_path();
                        
                        $_name = $_item->get_class();
                        $this->m_ncLoadedModules[$name] = new $_name;
                        $this->m_ncLoadedModules[$name]->set_ressource($_item);
                    }
                }
            }
            return isset($this->m_ncLoadedModules[$name]) ? $this->m_ncLoadedModules[$name] : null;
        }

        private $m_ncRessourcenList;
        private $m_ncLoadedModules;
    };
?>
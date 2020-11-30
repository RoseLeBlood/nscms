<?php 
    require_once dirname(__FILE__) .  '/nc.module.info.php';
    require_once dirname(__FILE__) .  '/../base/nc.base.list.php';

    class nc_module_ressourcen_list extends nc_base_list {
        public function __construct($parent) { 
            nc_base_list::__construct($parent);
        }
        public function get_all() {
            return $this->m_arrayItems;
        }
        public function get_active() {
            $_retItemsarray = array();

            foreach($this->m_arrayItems as $item) {
                if($item->is_active()) {
                    $_retItemsarray[] = $item;
                }
            }
            return $_retItemsarray;
        }
        public function get_by_name($name) {
            $_retevent = null;

            foreach($this->m_arrayItems as $item) {
                if($item->get_name() == $name) {
                    $_retevent = $item; break;
                }
            }

            return $_retevent;
        }

        protected function list_files() {
            $fileList = $this->list_dir(NC_BASE_DIR . '/'. NC_MODULE_PATH);
            

            foreach($fileList as $filename) { 
                $path = NC_BASE_DIR . '/'. NC_MODULE_PATH . "/$filename";
                

                if(is_dir ($path) ) {
                    $_sub_fileList = $this->list_dir($path);

                    foreach($_sub_fileList as $subFilename) {
                        $_path_sub = $path . "/$subFilename"; 

                        if(!is_dir ($_path_sub)) {
                            $this->add_file($filename . "/$subFilename", $this->get_parent() );
                        }
                    }
                } 
            }

        }
        private function add_file($filename, $parent) {
            if(pathinfo($filename, PATHINFO_EXTENSION) == "ncpm") {
                $this->m_arrayItems[] = nc_module_ressource::fromJson_file($filename, $parent);
            }
        }
        private function list_dir($path) {
            return array_diff(scandir($path), [".", ".."]);
        }
    };
?>
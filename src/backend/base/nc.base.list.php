<?php 
    require_once dirname(__FILE__) . '/nc.base.class.php';

    abstract class nc_base_list extends nc_object {
        public function __construct($parent) {
            nc_object::__construct($parent);

            $this->m_arrayItems = array();
            $this->list_files();
        }
        public function get_item($id) {
            return $this->m_arrayItems[$id];
        }
        public function get_count() {
           return count($this->m_arrayItems);
        }

        protected abstract function list_files();

        protected $m_arrayItems;
    };

?>
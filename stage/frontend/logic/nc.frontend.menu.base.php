<?php 

    class nc_frontend_menu_base extends nc_object {
        public function __construct($type, $args, $parent) {
            nc_object::__construct($parent);
            
            $this->m_pArgs = $args;
            $this->m_type = $type;
        }
        public function get_type()  { return $this->m_type; }
        public function get()       { return $this->m_pArgs; }

        protected $m_pArgs;
        protected $m_type;
    };

?>
<?php 

    class nc_frontend_menu_widget extends nc_frontend_menu_base {
        public function __construct($args, $parent) {
            nc_frontend_menu_base::__construct("widget", $args, $parent);
        }
        public function get_variable() { return $this->m_pArgs["variable"]; }
        public function get_content() { return $this->m_pArgs["content"]; }
    };

?>
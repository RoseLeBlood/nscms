<?php 

    class nc_frontend_menu_link extends nc_frontend_menu_base {
        public function __construct($args, $parent) {
            nc_frontend_menu_base::__construct("link", $args, $parent);
        }

        public function get_text()  { return $this->m_pArgs["text"]; }
        public function get_link()  { return $this->m_pArgs["link"]; }
        public function get_icon()  { return $this->m_pArgs["icon"]; }
        public function get_aria()  { return $this->m_pArgs["aria"]; }
    };

?>
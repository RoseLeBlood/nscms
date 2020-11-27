<?php 
    require_once dirname(__FILE__) . '/nc.base.visual.php';

    class nc_visual_modular extends nc_visual_object {

        public function __construct($nc_file_object) {
            nc_visual_object::__construct($nc_file_object);

            $this->m_arrayModule = array();
        }
        public function setvar() {
            foreach($this->m_arrayModule as $Key => $item) {
                $item->setvar();
            }
        }

        public function render() {
            foreach($this->m_arrayModule as $Key => $item) {
                $content = "<!-- start $Key -->\n";
                $content .= $item->render() . "\n";
                $content .= "<!-- stop $Key -->\n";

                $this->set_variable($Key, $content);

            }
            return $this->get_content();
        }

        public function get_module($keyVar) {
            return $this->m_arrayModule[$keyVar];
        }
        protected function add_module($keyVar, $ncVisualSite) {
            $this->m_arrayModule[$keyVar] = $ncVisualSite; 
        }

        protected $m_arrayModule;
    };

?>
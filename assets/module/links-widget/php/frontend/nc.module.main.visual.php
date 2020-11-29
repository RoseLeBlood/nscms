<?php 
    /**
     * The base visual class for the widget
     */
    class nc_module_links_visual extends nc_module_visual_widget {
        public function __construct($baseMod, $list) {
            nc_module_visual_widget::__construct($baseMod);

            $this->m_pContent =  new nc_links_widget_content(dirname(__FILE__), $list, $this ) ;
        }
        public function setvar() {
            nc_module_visual_widget::setvar();
            $this->m_pContent->setvar();

            $this->set_variable("NC_WIDGET_HEADER", "Links");
            $this->set_variable("NC_WIDGET_CONTENT", $this->m_pContent->render() );
        }
        public function get_visual() {
            return null;
        }
        private $m_pContent;
    };

?>
<?php 
    // The main include for the main module api
    require_once NC_BASE_DIR . '/stage/module.inc/nc.module.inc.php';

    /**
     * The visual content for this about widget
     */
    class nc_about_widget_visual extends nc_module_visual_widget {
        public function __construct($baseMod) {
            nc_module_visual_widget::__construct($baseMod, false);
        }
        public function setvar() {
            nc_module_visual_widget::setvar();

            $this->set_variable("NC_WIDGET_HEADER", "About");
            $this->set_variable("NC_WIDGET_HEADER_BADGE", "" );
            $this->set_variable("NC_WIDGET_CONTENT", 
                "Etiam porta sem malesuada magna mollis euismod. Cras mattis consectetur purus sit amet 
                fermentum. Aenean lacinia bibendum nulla sed consectetur." );
        }
    };

    /**
     * The base class for this simple-widget module
     */
    class nc_about_widget extends nc_module_base {
        public function __construct($ncRessource, $parent) {
            nc_module_base::__construct($ncRessource, $parent);

            $this->m_pWidgetVisual = new nc_about_widget_visual($this);
        }
        public function get_visual() {
            return $this->m_pWidgetVisual;
        }

        private $m_pWidgetVisual;
    };



?>
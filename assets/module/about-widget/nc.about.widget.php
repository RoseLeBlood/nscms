<?php 
    // The main include for the main module api
    require_once NC_BASE_DIR . '/stage/module.inc/nc.module.inc.php';
    require_once NC_BASE_DIR . '/stage/backend/base/nc.base.file.md.php';

    /**
     * The visual content for this about widget
     */
    class nc_about_widget_visual extends nc_module_visual_widget {
        public function __construct($baseMod) {
            nc_module_visual_widget::__construct($baseMod, false);

            $this->m_mdAbout = new nc_base_file_md(NC_BASE_DIR . NC_SITE_ABOUT_WIDGET, $this);
        }
        public function setvar() {
            nc_module_visual_widget::setvar();

            $this->set_header("About");
            $this->set_badge("" );
            $this->set_content( $this->m_mdAbout->get_html_extra(260) );
        }

        private $m_mdAbout;
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
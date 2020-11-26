<?php 
    // The main include for the main module api
    require_once 'inc/nc.module.inc.php';
    
    // all module backend includes
    require_once dirname(__FILE__) . '/backend/nc.link.items.php';
    require_once dirname(__FILE__) . '/backend/nc.link.list.php';

    // all module frontend includes
    require_once dirname(__FILE__) . '/frontend/nc.links.widget.content.php';
    require_once dirname(__FILE__) . '/frontend/nc.module.main.visual.php';
    
    /**
     * The base object class of thie module. This class laod from the plugin system
     * and must be defined in the ncpm (nc_plugin_manifest) under "class"
     */
    class nc_module_links_widget extends nc_module_base {
        public function __construct() {
            nc_module_base::__construct();

            // The visual object can not create her, becourse the loaded ressources are not setted
            $this->m_pWidgetVisual = null;

            $this->m_pLinksList = new nc_link_list();
        }
        public function get_visual() {
            if($this->m_pWidgetVisual == null)
                $this->m_pWidgetVisual = new nc_module_links_visual($this, $this->m_pLinksList);

            return $this->m_pWidgetVisual;
        }

        
        private $m_pWidgetVisual;
        private $m_pLinksList;
    };

?>
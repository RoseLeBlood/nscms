<?php 
    // The main include for the main module api
    require_once NC_BASE_DIR . '/stage/module.inc/nc.module.inc.php';
    // all module frontend includes
    require_once dirname(__FILE__) . '/nc.module.links.php';
    
    
    /**
     * The base object class of thie module. This class laod from the plugin system
     * and must be defined in the ncpm (nc_plugin_manifest) under "class"
     */
    class nc_module_links_widget extends nc_module_base {
        public function __construct($ncRessource, $parent) {
            nc_module_base::__construct($ncRessource, $parent);

            if($this->opendb())
                $this->m_pWidgetVisual = new nc_module_links($this, $this->m_dbList);
            else {
                throw new Exception('["Link-view-wigdet"] Error on load the db!');
            }

        }
        public function get_visual() {
            return $this->m_pWidgetVisual;
        }

        private $m_pWidgetVisual;
        private $m_pLinksList;
    };

?>
<?php 
    require_once 'backend/base/nc.base.visual.php';

    class nc_module_base_visual extends nc_visual_object {
        public function __construct($objectFile, $baseModule) {
            nc_visual_object::__construct( $objectFile);
           
            $this->m_module = $baseModule;
            $this->m_modRessource = $baseModule->get_ressource();
        }

        public function setvar() {
            
        }
        public function render() {
            return $this->get_content();
        }
       

        protected $m_module;
        protected $m_modRessource;
    };


?>
<?php 
    require_once 'backend/base/nc.base.visual.modular.php';

    class nc_module_base_visual extends nc_visual_modular {
        public function __construct($objectFile, $baseModule) {
            nc_visual_modular::__construct( $objectFile);
           
            $this->m_module = $baseModule;
            $this->m_modRessource = $baseModule->get_ressource();
        }

        public function setvar() {
            nc_visual_modular::setvar();
        }
        public function render() {
            $content = nc_visual_modular::render();
            return $content;
        }
       

        protected $m_module;
        protected $m_modRessource;
    };


?>
<?php 
    require_once "backend/base/nc.base.visual.modular.php";

    class nc_module_visual_bright extends nc_visual_modular  {

        public function __construct($ncModName, $parent) {

            $this->m_pModule = nc_module_system::instance()->get_object($ncModName);
            if($this->m_pModule == null) 
                throw new Exception("Module: $ncModName not found or is not active marked");
            
            $this->m_pVisual = $this->m_pModule->get_visual();
            $this->m_nameMod = $ncModName;
            
            nc_visual_modular::__construct(null);

        }
        public function setAndRender() {
            $this->setvar();
            return $this->render();
        }
        public function setvar() {
            $this->m_pVisual->setvar();
        }
        public function render() {
            return $this->m_pVisual->render();
        }
        public function get_name() {
            return $this->m_nameMod;
        }

        protected $m_nameMod;
        protected $m_pModule;
        protected $m_pVisual;
    };


?>
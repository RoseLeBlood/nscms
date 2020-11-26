<?php 
    require_once 'backend/base/nc.base.visual.php';

    class nc_module_visual_bright  {
        public function __construct($ncModName) {
            $this->m_pModule = nc_module_system::instance()->get_object($ncModName);
            if($this->m_pModule == null) 
                throw new Exception("Module: $ncModName not found or is not active marked");
            
            $this->m_pVisual = $this->m_pModule->get_visual();

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

        protected $m_nameMod;
        protected $m_pModule;
        protected $m_pVisual;
    };


?>
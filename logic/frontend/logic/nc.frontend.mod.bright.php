<?php 
    require_once dirname(__FILE__) . '/../../backend/base/nc.base.visual.modular.php';

    class nc_module_visual_bright extends nc_visual_modular  {

        public function __construct($ncModName, $parent) {
            nc_visual_modular::__construct(null, $parent);

            // Get module object from module system 
            $this->m_pModule = nc_module_system::instance()->get_object($ncModName, $this);
            if($this->m_pModule == null) 
                throw new Exception("Module: $ncModName not found or is not active marked");
            
            // Get visual object from module
            $this->m_pVisual = $this->m_pModule->get_visual();

            // Save name for footer
            $this->m_nameMod = $ncModName;
        }
        public function setAndRender() {
            $this->setvar();
            return $this->render();
        }
        public function setvar() {
            // "setvariable" the visual object
            $this->m_pVisual->setvar();
        }
        public function render() {
            // "render" the visual object
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
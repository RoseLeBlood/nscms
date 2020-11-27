<?php 
    /* All Modules must use this as base class */
    require_once "backend/module/nc.module.item.php";

    /**
     * The base class for a module, all user modules must extends this class
     */
    abstract class nc_module_base extends nc_base_module_abstract {
    
        public function __construct($ncRessource, $parent) {
            nc_base_module_abstract::__construct($parent);
            $this->m_ncModuleRessorce = $ncRessource;
        }
        /**
         * Get the visual object 
         * 
         */
        public abstract function get_visual();

        public function get_path() {
            return $this->m_ncModuleRessorce->get_mod_path();
        }
        public function get_ressource() {
            return $this->m_ncModuleRessorce;
        }

        protected $m_ncModuleRessorce;
    };

?>
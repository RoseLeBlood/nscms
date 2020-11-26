<?php 
    /* All Modules must use this as base class */

    require_once "backend/module/nc.module.item.php";

    /**
     * The base class for a module, all user modules must extends this class
     */
    abstract class nc_module_base extends nc_base_module_abstract {
    
        public function __construct() {
            nc_base_module_abstract::__construct();
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
        

        /**
         * Set the module ressource, call from module system, when object created
         */
        public function set_ressource($ncRessource) {
            $this->m_ncModuleRessorce = $ncRessource;
        }

        protected $m_ncModuleRessorce;
    };

?>
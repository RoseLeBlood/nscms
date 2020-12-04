<?php 
    /**
     * The base class for a module, all user modules must extends this class
     */
    abstract class nc_module_base extends nc_base_module_abstract {
    
        public function __construct($ncRessource, $parent) {
            nc_base_module_abstract::__construct($parent);
            $this->m_ncModuleRessource = $ncRessource;

        }
        /**
         * Get the visual object 
         * 
         */
        public abstract function get_visual();

        public function get_path() {
            return $this->m_ncModuleRessource->get_mod_path();
        }
        public function get_ressource() {
            return $this->m_ncModuleRessource;
        }
        public function opendb($ncNameDB = 'nc_module_base_db', $assoc = true, $depth = 30, $options = 0) {
            if($this->get_ressource()->use_db()) {
                $db = $this->get_ressource()->get_db();

                $this->m_dbList = new $ncNameDB( 
                    $db, 
                    $assoc, 
                    $depth, 
                    $options);
            }
            return ($this->m_dbList != null);
        }
      

        protected $m_ncModuleRessource;
        protected $m_dbList;
    };

?>
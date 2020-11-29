<?php 
    require_once dirname(__FILE__) .  '/../base/nc.base.file.php';

    class nc_module_base_file extends nc_base_file {
        public function __construct($modRessource, $file, $parent) {
            $this->m_modRessource = $modRessource;

            $_modpath = $this->m_modRessource->get_mod_path();
            nc_base_file::__construct($modpath . "/$file", $parent);
        }
        protected $m_modRessource;
    };


?>
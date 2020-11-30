<?php 
    require_once dirname(__FILE__) . '/../base/nc.base.dyncfg.loader.php';

    class nc_config_json extends nc_base_dyncfg_loader {
        protected function __construct() {
            $cfg = 'config/nc.main.infos.jsonc';
            nc_base_dyncfg_loader::__construct($cfg, 'NC', null);
        }
        public static function load() {
            $inst = new nc_config_json();
            return $inst;
        }
    };

    nc_config_json::load(); 
?>
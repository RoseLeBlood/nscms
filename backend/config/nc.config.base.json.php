<?php 
    require_once "backend/base/nc.base.dyncfg.loader.php";

    class nc_config_json extends nc_base_dyncfg_loader {
        protected function __construct() {
            nc_base_dyncfg_loader::__construct('cfg/nc.main.infos.jsonc');
        }
        public static function load() {
            $inst = new nc_config_json();
            return $inst;
        }
    };

    nc_config_json::load();
?>
<?php 
    require_once dirname(__FILE__) . '/../backend/module/nc.module.visual.php';
    require_once dirname(__FILE__) . '/../backend/module/nc.module.file.php';

    /**
     * Basis class for a visual object of a module for type content
     */
    class nc_module_visual_content extends nc_module_base_visual {
        public function __construct($htmlTempl, $baseModule) {
            nc_module_base_visual::__construct( new nc_module_base_file(
                $baseModule->get_ressource(), $htmlTempl), $baseModule );
        }
    };

?>
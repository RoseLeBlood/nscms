<?php 
    require_once 'backend/module/nc.module.visual.php';
    require_once "backend/base/nc.base.file.skin.php";

    abstract class nc_module_visual_widget extends nc_module_base_visual {
        public function __construct($baseModule) {
            nc_module_base_visual::__construct( 
                new nc_base_file_skin("nc.page.simple.widget.htm"), $baseModule );

        } 

        public abstract function get_visual();
    };

?>
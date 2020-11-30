<?php 
    require_once dirname(__FILE__) . '/../backend/module/nc.module.visual.php';
    require_once dirname(__FILE__) . '/../backend/base/nc.base.file.skin.php';

    class nc_module_visual_widget extends nc_module_base_visual {
        public function __construct($baseModule, $nDesign = true) {
            nc_module_base_visual::__construct( 
                new nc_base_file_skin($nDesign ? "nc.page.simple.widget.htm" 
                    : "nc.page.simple.widget-alt.htm", $this), $baseModule );

        } 
    };

?>
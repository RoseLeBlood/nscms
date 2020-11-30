<?php 

    require_once dirname(__FILE__) . '/nc.base.file.skin.php';
    require_once dirname(__FILE__) . '/nc.base.visual.modular.php';

    class nc_visual_site_mod extends nc_visual_modular {
        public function __construct($htmlTempl, $parentSite) {
            if($htmlTempl != null)
                nc_visual_modular::__construct( new nc_base_file_skin($htmlTempl, $this), 
                                                $parentSite );
            else
                nc_visual_modular::__construct( null, $parentSite );
        }
        public function setvar() {
            nc_visual_modular::setvar();
        }
        public function render() {
            $content = nc_visual_modular::render();
            return $content;
        }
    };

?>
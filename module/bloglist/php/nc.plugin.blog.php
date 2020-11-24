<?php 
    require_once "backend/base/nc.base.class.php";
    require_once "backend/module/nc.module.item.php";
    require_once "backend/utils/nc.utils.base.php";

    class nc_module_blog_class implements nc_interface_module {
        public function __construct() {
            
        }
        public function get_visual_object() {
            return null;
        }

    };

?>
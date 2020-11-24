<?php 
    require_once "backend/config/nc.config.base.php";
    

    interface nc_interface_object  {
        public function to_string();
    };

    class nc_object implements nc_interface_object {
        public function to_string() {
            $parent = nc_object::parents($this);
            $class =__CLASS__;
            return "[$class:$parent]";
        }

        public function get_parent() {
            return nc_object::parent_class($this);
        }
        public function get_parents() {
            return nc_object::parents($this);
        }

        public static function parents($obj) {
            $parent = class_parents($obj);
            return implode(":", $parent);
        }
        public static function parent_class($obj) { 
            return get_parent_class($obj);
        }
    };
?>
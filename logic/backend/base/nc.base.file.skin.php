<?php
    require_once dirname(__FILE__) . '/nc.base.file.php';

    class nc_base_file_skin extends nc_base_file {
        public function __construct($file, $parent) {
            $_filePath = NC_BASE_DIR . NC_SKIN_BASE_PATH . "/$file";
            
            if(!file_exists($_filePath))
                $_filePath = NC_SKIN_PATH . "/default/$file";

            nc_base_file::__construct($_filePath, $parent);
        }
    };
?>
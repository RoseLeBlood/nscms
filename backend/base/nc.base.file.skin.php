<?php
    require_once dirname(__FILE__) . '/nc.base.file.php';

    class nc_base_file_skin extends nc_base_file {
        public function __construct($file) {
            $_filePath = NC_SKIN_PATH . NC_SKIN_NAME . "/$file";
            
            if(!file_exists($_filePath))
                $_filePath = NC_SKIN_PATH . "default/$file";

            nc_base_file::__construct($_filePath);
        }
    };
?>
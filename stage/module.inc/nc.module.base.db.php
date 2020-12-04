<?php
    require_once dirname(__FILE__) . '/../backend/base/nc.base.db.php';

    class nc_module_base_db extends nc_base_db {
        public function __construct($directory, $assoc = true, $depth = 30, $options = 0) {
            nc_base_db::__construct($directory, $assoc, $depth, $options);
        }
        protected function add2array($file, $data) {
            $array = ["file"=>  $file, 
                      "data" => $data ];
                      
            array_push($this->m_arrayItems, $array);
        }
    };
?>
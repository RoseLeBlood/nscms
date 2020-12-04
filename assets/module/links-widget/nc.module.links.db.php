<?php 

    class nc_module_links_db extends nc_module_base_db {
        public function __construct($directory, $assoc = true, $depth = 30, $options = 0) {
            $this->m_arrayItems = ["Links" => [], "count" => 0];
            nc_module_base_db::__construct($directory, $assoc, $depth, $options);
        }
        protected function add2array($file, $data) { 
            foreach($data["Links"] as $item) {
                $this->m_arrayItems["Links"][] = $item;
            }
            if(isset($this->m_arrayItems["count"]))
                $this->m_arrayItems["count"] += $data["count"];
            else
                $this->m_arrayItems["count"] = $data["count"];
        }
    }
?>
<?php 
    

    class nc_module_ressource extends nc_base_file_json {

        protected function __construct($arrayInfo, $file) { 
            nc_base_file_json::__construct($arrayInfo, $file);

            $this->m_strModulePath = dirname($file);
        }
        static public function fromJson_file($file) {
            $path = NC_MODULE_PATH . "/$file";

            $fle_content = file_get_contents($path);
            $array = json_decode($fle_content);

            return new nc_module_ressource($array, $path);
        }
        public function is_active()          { return $this->get("active"); }
        public function set_active($bOn)     { $this->set("active", $bOn); }

        public function get_name()           { return $this->get("name"); }
        public function get_author()         { return $this->get("author"); }
        public function get_version()        { return $this->get("version"); }
        public function get_config()         { return $this->get("config"); }

        public function get_class()          { return $this->get("class"); }
        public function get_class_path()     { return $this->m_strModulePath . "/" . $this->get("class-path"); }  
        public function get_config_path()    { return $this->m_strModulePath . "/" . $this->get("config"); }
        
        protected $m_strModulePath;
    };

?>
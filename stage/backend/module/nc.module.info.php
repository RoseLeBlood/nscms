<?php 
    

    class nc_module_ressource extends nc_base_file_json {

        protected function __construct($arrayInfo, $file, $parent) { 
            nc_base_file_json::__construct($arrayInfo, $file, $parent);

            $this->m_strModulePath = dirname($file);
        }
        static public function fromJson_file($file, $parent) {
            $path = NC_BASE_DIR . '/'. NC_MODULE_PATH . "/$file";

            $fle_content = file_get_contents($path);
            $array = json_decode($fle_content);

            return new nc_module_ressource($array, $path, $parent);
        }
        public function set_active($bOn, $bWrite = true) { 
            $this->set("active", $bOn); if($bWrite) $this->write(); }

        public function is_active()         { return $this->get("active"); }
        public function use_config()        { return ($this->get_config() != "USE_NO_CONFIG"); }

        public function get_name()          { return $this->get("name"); }
        public function get_author()        { return $this->get("author"); }
        public function get_version()       { return $this->get("version"); }
        public function get_config()        { return $this->get("config", "USE_NO_CONFIG"); }

        public function get_class()         { return $this->get("class"); }
        
        

        public function get_type()          { return $this->get("type"); }
        public function use_db()            { return $this->get("usedb"); }

        public function get_db()            { return $this->get("db"); }
        public function get_contact()       { return $this->get("contact"); }

        public function is_widget()         { return $this->get_type() == 'widget'; }
        public function is_content()        { return $this->get_type() == 'content'; }

        public function get_mod_path()      { return $this->m_strModulePath; }

        public function get_config_path()   { 
            if($this->use_config()) {
                $_name = $this->get_name();
                throw new Exception("[Mod:'$_name'] don't have a config"); 
            } else 
                return $this->m_strModulePath . "/" . $this->get("config"); 
        }
        public function get_class_path()    { 
            return $this->m_strModulePath . "/" . $this->get("class-path"); 
        }  
        

        protected $m_strModulePath;
    };

?>
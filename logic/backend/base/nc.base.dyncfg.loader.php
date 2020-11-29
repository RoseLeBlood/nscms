<?php 

    require_once dirname(__FILE__) . '/nc.base.file.json.php';

    /**
     * This class parse the json file to PHP Defines
     * @example 
     *      cfg.json: 
     *          { "name": "Peter", "Adress": {"street": "Walterweg 7", "ort": "Paderborn"} }
     * 
     * wird: (extension 'NC'):
     *      define('NC_NAME', "Peter"); 
     *      define('NC_ADRESS_STREET', "Walterweg 7"); 
     *      define('NC_ADRESS_ORT', "Paderborn"); 
     */
    class nc_base_dyncfg_loader extends nc_object {
        protected function __construct($file, $defineAdd = 'NC', $parent = null) {
            nc_object::__construct($parent);

            $fle_content = file_get_contents($file);
            $array = json_decode($fle_content);

            self::parse_out($array, $defineAdd); 
        }
        private function parse($key, $item, $add = "") {
            $var = strtoupper($add .'_'.$key);
            $var = str_replace('-', '_', $var);

            define($var, $item); 
        }
        private function parse_out($array, $add = "") {
            foreach($array as $key => $item) { 
                if(is_object($item) ) {
                    self::parse_out($item, $add."_$key");
                } else if(is_array($item))  {
                    self::parse_out($item, $add."_$key");
                } else if(is_string($item) ) {
                    self::parse($key, $item, $add);
                } 
            } 
        }
    };
?>
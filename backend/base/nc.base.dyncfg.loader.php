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
    class nc_base_dyncfg_loader {
        protected function __construct($file, $defineAdd = 'NC') {

            $fle_content = file_get_contents($file);
            $array = json_decode($fle_content);

            self::parse_out($array, $defineAdd); 
        }
        private function parse($key, $item, $add = "") {
            $var = strtoupper($add .'_'.$key);
            $var = str_replace('-', '_', $var);

            define($var, $item); 

            //echo $var . " => " . $item . "\n"; 
        }
        private function parse_out($array, $add = "") {
            foreach($array as $key => $item) { 
                if(is_object($item) ) {
                    self::parse_out($item, $add."_$key");
                } else {
                    self::parse($key, $item, $add);
                }
            }
            
        }

    };


?>
<?php 

    require_once dirname(__FILE__) . '/nc.base.file.json.php';

    class nc_base_json_config {
        static public function load() {

            $fle_content = file_get_contents('json/nc.main.infos.jsonc');
            $array = json_decode($fle_content);

            self::parse_out($array, "NC");
        }
        static function parse($key, $item, $add = "") {
            $var = strtoupper($add . "_$key");
            $var = str_replace("-", "_", $var);

            define($var, $item); 
        }
        static function parse_out($array, $add = "") {
            foreach($array as $key => $item) {
                if(is_string($item))
                    self::parse($key, $item, $add);
                else {
                    self::parse_out($item, $add."_$key");
                }
            }
        }

    };

    nc_base_json_config::load();

?>
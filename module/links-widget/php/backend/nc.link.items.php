<?php 
    class nc_link_item extends nc_base_file_json {

        protected function __construct($arrayInfo, $file) { 
            nc_base_file_json::__construct($arrayInfo, $file);
        }
        static public function fromJson_file($file) {
            $_file = NC_TABLE_PATH  . "/links/$file";

            $fle_content = file_get_contents( $_file );
            $array = json_decode($fle_content);

            return new nc_link_item($array, $_file);
        }
        public function get_name() {
            return $this->get("name");
        }
        public function get_link() {
            return $this->get("link");
        }
        public function is_follow() {
            return $this->get("follow");
        }
    };

?>
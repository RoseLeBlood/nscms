<?php 
    require_once dirname(__FILE__) . '/nc.base.file.php';

    class nc_base_file_json extends nc_base_file implements JsonSerializable {
        protected function __construct($arrayInfo, $file, $parent) {
            nc_base_file::__construct($file, $parent);

            $this->m_arrayInfos = $arrayInfo;
        }
        public function get_jsonfile() { 
            return $this->get_file(); 
        }
        public function get($jsonKey, $alt = "") {
            return isset($this->m_arrayInfos->{ $jsonKey }) ? $this->m_arrayInfos->{ $jsonKey } : $alt;
        }
        public function set($jsonKey, $item) {
            $this->m_arrayInfos->{ $jsonKey } = $item;
        }
        public function jsonSerialize() {
            return $this->m_arrayInfos;
        }
        public function to_json() {
            return json_encode($this);
        }
        public function write() {
            $_json = $this->to_json();
            return $this->set_contents( $_json );
        }

        protected $m_arrayInfos;
    };
?>
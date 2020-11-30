<?php 
    require_once dirname(__FILE__) . '/nc.base.file.json.php';

    class nc_base_table extends nc_base_file_json {
        static $ISNAT = -1;

        protected function __construct($arrayInfo, $file, $parent) { 
            nc_base_file_json::__construct($arrayInfo, NC_TABLE_PATH . $file, $parent);

            $this->m_intID = $this->get("id", $ISNAT);
        }
        static public function fromJson_file($file) {
            $fle_content = file_get_contents(NC_TABLE_PATH . $file );
            $array = json_decode($fle_content, true);

            return new nc_base_table($array, $file);
        }
        public function get_id() { return $this->m_intID; }
        public function is() { return $this->m_intID > $ISNAT; }

        protected $m_intID;
    };

?>
<?php

    class nc_module_base_db {
        public function __construct($db, $assoc = true, $depth = 30, $options = 0) {
            $this->m_strPath = NC_BASE_DIR . NC_TABLE_PATH . $db;
            $this->m_arrayItems = array();

            $this->parse($assoc, $depth, $options);
        }
        
        public function get_path() {
            return $this->m_strPath;
        }
        public function get_array() {
            return $this->m_arrayItems;
        }
        public function get($id) {
            return $this->m_arrayItems[$id];
        }
        public function count() {
            return count($this->m_arrayItems);
        }


        private function parse($assoc = true, $depth = 30, $options = 0) {
            $fileList = array_diff(scandir($this->m_strPath), [".", ".."]);

            foreach($fileList as $filename) {
                if(!is_dir ($filename) ) {
                    if(pathinfo($filename, PATHINFO_EXTENSION) == "json") {
                        $fle_content = file_get_contents($this->m_strPath."/$filename" );
                        $jsonDecode = json_decode($fle_content, $assoc, $depth, $options);

                        $array = ["file"=>  $this->m_strPath."/$filename", 
                                  "data" => $jsonDecode ];

                        array_push($this->m_arrayItems, $array);
                    }
                }
            }
        }

        protected $m_arrayItems;
        protected $m_strPath;
    };
?>
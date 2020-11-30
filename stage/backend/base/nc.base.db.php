<?php 
    require_once dirname(__FILE__) . '/nc.base.class.php';

    class nc_base_db extends nc_object {
        public function __construct($directory = "", $assoc = true, $depth = 30, $options = 0) {
            nc_object::__construct(null);
            
            $this->m_strPath = NC_BASE_DIR . NC_TABLE_PATH . $directory;
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

        private function parse($assoc = true, $depth = 512, $options = 0) {
            $fileList = array_diff(scandir($this->m_strPath), [".", ".."]);

            foreach($fileList as $filename) {
                if(!is_dir ($filename) ) {
                    $pathExt = pathinfo($filename, PATHINFO_EXTENSION);

                    if($pathExt == "json" OR $pathExt == "jsonc") {
                        $fle_content = file_get_contents($this->m_strPath."/$filename" );
                        $jsonDecode = json_decode($fle_content, $assoc, $depth, $options);

                        $this->add2array($this->m_strPath."/$filename", $jsonDecode);
                    }
                }
            }
        }
        protected function add2array($file, $data) {
            $data['__$FILE'] = $file;
            array_push($this->m_arrayItems, $data);
        }

        protected $m_arrayItems;
        protected $m_strPath;
    };


?>
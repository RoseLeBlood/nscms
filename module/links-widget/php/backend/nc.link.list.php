<?php 
    
    
    /**
     * The base list of all links in the json entrys - links are in one ore in more json files
     */
    class nc_link_list extends nc_base_list {
        protected function list_files() {
            $fileList = array_diff(scandir(NC_TABLE_PATH . 'links'), [".", ".."]);

            foreach($fileList as $filename) {
                if(!is_dir ($filename) ) {

                    if(pathinfo($filename, PATHINFO_EXTENSION) == "json") {
                        $item = nc_link_item::fromJson_file($filename, $this->get_parent() );

                        $this->m_arrayItems[] = $item;
                    }
                }
            }
        } 
    };


?>
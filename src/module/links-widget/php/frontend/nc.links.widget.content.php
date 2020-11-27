<?php 

    class nc_visual_links extends nc_visual_object {
        public function __construct($path, $item, $parent) {
            
            //$this->m_fileContent = $this->m_ncFileObject->get_contents();
            $this->m_aItem = $item;

            nc_visual_object::__construct( new nc_base_file($path . '/../../htm/nc.link.htm', $this), $parent );
        }
        public function setvar() {
            $this->set_variable("NC_MODULE_LINK", $this->m_aItem->get_link());
            $this->set_variable("NC_MODULE_LINK_TEXT", $this->m_aItem->get_name());
            $this->set_variable("MODULE_LINK_FOLLOW", $this->m_aItem->is_follow() ? "follow" : "nofollow");
        }
        public function render() {
            return $this->get_content();
        }
        private $m_aItem;
    };
    class nc_links_widget_content extends nc_visual_object {
        public function __construct($path, $linkTable, $parent) {
            nc_visual_object::__construct(null, $parent);
            
            for($i = 0; $i < $linkTable->get_count(); $i++) {
                $item = $linkTable->get_item($i);
                $this->m_arrayItems[] = new nc_visual_links($path, $item, $this);
            } 
        }
        public function setvar() {
            foreach($this->m_arrayItems as $item) {
                $item->setvar();
            }
        }
        public function render() {
            $this->m_fileContent .= '<ol class="list-unstyled">';
            foreach($this->m_arrayItems as $item) {
                $this->m_fileContent .=  $item->render();
            }
            $this->m_fileContent .= '</ol>';

            return $this->get_content();
        }
        private $m_arrayItems;
    }

?>
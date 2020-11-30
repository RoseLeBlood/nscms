<?php 

    /**
     * This is the link object - template is in 'nc.link.htm'
     */
    class nc_module_link extends nc_visual_object {
        public function __construct($item, $parent = null) {
            $this->m_aItem = $item;

            nc_visual_object::__construct( 
                new nc_base_file(dirname(__FILE__).'/nc.link.htm', $this), 
                $parent );
        }
        public function setvar() {
            $this->set_variable("NC_MODULE_LINK", $this->m_aItem["link"]);
            $this->set_variable("NC_MODULE_LINK_TEXT", $this->m_aItem["name"]);
            $this->set_variable("NC_MODULE_LINK_FOLLOW", $this->m_aItem["follow"] ? "follow" : "nofollow");
            $this->set_variable("NC_MODULE_LINK_ARIA_LABEL", $this->m_aItem["aria"] );
        }
        public function render() {
            return $this->get_content();
        }
        private $m_aItem;
    };

    /**
     * The base visual class for the widget
     */
    class nc_module_links extends nc_module_visual_widget {
        public function __construct($baseMod, $list) {
            nc_module_visual_widget::__construct($baseMod);

            $this->m_arrayLink = array();
            $this->create_links($list->get_array());
            $iCont = $list->get_array();

            $this->m_iCount = $iCont[0]["data"]["count"];
        }
        public function setvar() {
            nc_module_visual_widget::setvar();

            foreach($this->m_arrayLink as $item) {
                $this->m_content .= $item->setvar();
            }

            $this->set_variable("NC_WIDGET_HEADER", "Links");
            $this->set_variable("NC_WIDGET_HEADER_BADGE", $this->m_iCount );
            
        }
        public function render() {
            nc_module_visual_widget::render();
            $this->render_links();
            $this->set_variable("NC_WIDGET_CONTENT", $this->m_content );

            return $this->get_content();
        }
        private function create_links($list) {
            
            foreach($list[0] as $link) {
                if(is_array($link)) {
                    foreach($link["Links"] as $item) {
                        $this->m_arrayLink[] = new nc_module_link($item);
                    }
                }  
            }
        }
        private function render_links() {
            $this->m_content = '<ol class="list-unstyled">'."\n";

            foreach($this->m_arrayLink as $item) {
                $this->m_content .= $item->render();
            }

            $this->m_content .= '</ol>'."\n";
        }
        private $m_content;
        private $m_arrayLink;
        private $m_iCount;
    };

?>
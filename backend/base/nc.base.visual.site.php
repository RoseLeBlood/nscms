<?php 
    require_once dirname(__FILE__) . '/nc.base.file.skin.php';
    require_once dirname(__FILE__) . '/nc.base.visual.php';
    

    class nc_visual_site extends nc_visual_object {
        public function __construct($htmlTempl, $title, $desc = "") {
            nc_visual_object::__construct( new nc_base_file_skin($htmlTempl) );

            $this->m_strText = $title;
            $this->m_strDesc = $desc;
            $this->m_arrayModule = array();
        }


        public function setvar() {
            foreach($this->m_arrayModule as $Key => $item) {
                $item->setvar();
            }
        }


        public function render() {
            foreach($this->m_arrayModule as $Key => $item) {
                $content = "<!-- start $Key -->\n";
                $content .= $item->render() . "\n";
                $content .= "<!-- stop -->\n";

                $this->set_variable($Key, $content);

            }
            return $this->get_content();
        }

        
        protected function add_module($keyVar, $ncVisualSite) {
            $this->m_arrayModule[$keyVar] = $ncVisualSite; 
        }

        protected $m_strText;
        protected $m_strDesc;

        protected $m_arrayModule;
    };

    
?>
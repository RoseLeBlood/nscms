<?php 
    require_once 'backend/module/nc.module.visual.php';
    require_once 'backend/module/nc.module.file.php';

    /**
     * Basis class for a visual object of a module for type content
     */
    abstract class nc_module_visual_content extends nc_module_base_visual {
        public function __construct($htmlTempl, $baseModule) {
            nc_module_base_visual::__construct( new nc_module_base_file(
                $baseModule->get_ressource(), $htmlTempl), $baseModule );

            $this->m_arrayModule = array();
        }

        /**
         * Get the visual object 
         * 
         */
        public abstract function get_visual();

        public function setvar() {
            foreach($this->m_arrayModule as $Key => $item) {
                $item->setvar();
            }
        }


        public function render() {
            $name = $this->m_ncModuleRessorce->get_name();

            foreach($this->m_arrayModule as $Key => $item) {
                $content = "<!-- start $Key@$name -->\n";
                $content .= $item->render() . "\n";
                $content .= "<!-- stop -->\n";

                $this->set_variable($Key, $content);

            }
            return $this->get_content();
        }


        protected function add_module($keyVar, $ncVisualSite) {
            $this->m_arrayModule[$keyVar] = $ncVisualSite; 
        }
        
        protected $m_arrayModule;
    };

?>
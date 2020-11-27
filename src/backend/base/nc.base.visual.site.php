<?php 
    require_once dirname(__FILE__) . '/nc.base.file.skin.php';
    require_once dirname(__FILE__) . '/nc.base.visual.modular.php';
    

    class nc_visual_site extends nc_visual_modular {
        public function __construct($htmlTempl, $title, $parent) {
            nc_visual_modular::__construct( new nc_base_file_skin($htmlTempl, $this), 
                                            $parent );

            $this->m_strText = $title;
        }
        public function setvar() {
            nc_visual_modular::setvar();

            $this->set_variable("NC_SITE_TITLE_PAGE", $this->m_strText);
            $this->set_variable("NC_VERSION_STRING", NC_VERSION_STRING);
        }
        public function render() {
            $content = nc_visual_modular::render();

            return $content;
        }
        protected $m_strText;
    };

    
?>
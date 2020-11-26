<?php 
    require_once "backend/config/nc.config.php";
    require_once "backend/base/nc.base.visual.site.php";
    require_once "frontend/logic/nc.frontend.mod.bright.php";

    class nc_front_main extends nc_visual_site {
        public function __construct($nameofMod) {
            nc_visual_site::__construct("nc.page.debug.mod.test.htm", "home");

            $this->add_module("NC_SITE_MODULE_MAIN_CONTENT", new nc_module_visual_bright($nameofMod) );
            $this->m_nameMod = $nameofMod;
        }

        public function setvar() {
            nc_visual_site::setvar();

            $this->set_variable("NC_SITE_MODULE_TEST_NAME", $this->m_nameMod);
        }
        public function render() {
            nc_visual_site::render();

            return $this->m_fileContent;
        }
        protected $m_nameMod;
    };

    $site = new nc_front_main("Link-view-wigdet");

    echo $site->setAndRender();
?>

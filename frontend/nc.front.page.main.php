<?php 
    require_once "backend/base/nc.base.visual.site.php";

    require_once dirname(__FILE__) . "/nc.front.aseid.php";
    require_once dirname(__FILE__) . "/nc.front.navbar.php";    
    require_once dirname(__FILE__) . "/nc.front.footer.php";
    require_once dirname(__FILE__) . "/nc.front.blog.content.php";

    class nc_front_main extends nc_visual_site {
        public function __construct() {
            nc_visual_site::__construct("nc.page.home.htm", "home");

            $this->add_module("NC_SITE_MODULE_MAIN_CONTENT", new nc_front_blog_content() );

            $this->add_module("NC_SITE_MODULE_ASIDE", new nc_front_aseid() );
            $this->add_module("NC_SITE_MODULE_HEADER", new nc_front_navbar() );
            $this->add_module("NC_SITE_MODULE_FOOTER", new nc_front_footer() );
        }

        public function setvar() {
            nc_visual_site::setvar();

            $this->set_variable("NC_SITE_TITLE", NC_SITE_TILTE);
            $this->set_variable("NC_SITE_TITLE_PAGE", "home");
        }
        public function render() {
            nc_visual_site::render();

            return $this->m_fileContent;
        }
    };
?>


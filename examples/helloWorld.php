<?php
    require_once dirname(__FILE__) . "/../logic/backend/config/nc.config.php";
    require_once dirname(__FILE__) . "/../logic/backend/base/nc_base_vfile.php";

    require_once dirname(__FILE__) . "/../logic/frontend/nc.front.base.page.php";
    require_once dirname(__FILE__) . "/../logic/frontend/nc.front.blog.content.php";

    class nc_exawple_content extends nc_visual_modular {
        public function __construct($parent) {
            nc_visual_modular::__construct(
                new nc_base_vfile("Hello World", "", null), $parent );
        }
    }
    class nc_front_example_helloworld extends nc_front_base {
        
        public function __construct() {
            nc_front_base::__construct(new nc_exawple_content($this), 
                                       new nc_front_meta_infos($this), "example",
                                       null );
        }
        public function setvar() {
          // Set internal variables to the site
          nc_visual_modular::setvar();
          // We replace the var NC_SITE_MODULE_MAIN_CONTENT with "Hello World"
          $this->set_variable("NC_SITE_MODULE_MAIN_CONTENT", "Hello World"); 
      }
    };

    $site = new nc_front_example_helloworld();
    print $site->setAndRender();
?>
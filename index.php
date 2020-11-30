<?php 
    require_once "stage/backend/config/nc.config.php";
    require_once "stage/frontend/nc.front.base.page.php";
    require_once "stage/frontend/nc.front.blog.content.php";

    class nc_front_main extends nc_front_base {
        public function __construct() {
            nc_front_base::__construct(new nc_front_blog_content($this), 
                                       new nc_front_meta_infos($this),
                                       "Startseite", null );
        }
    };

    $site = new nc_front_main();
   print $site->setAndRender();

   //echo NC_SKIN_PATH;
?>
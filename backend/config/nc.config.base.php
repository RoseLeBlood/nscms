<?php 
    //------------- Site Config -------------
    define('NC_SITE_TILTE', 'A new NoSQLBlog', true);
    define('NC_SITE_SUBTITLE', 'A simple blog system without sql', true);
    define('NC_SKIN_NAME', 'default', true);

    //------------- Do not edit after this line -------------
    define('NC_VERSION_MAYOR', 0, true);
    define('NC_VERSION_MINOR', 4, true);
    define('NC_VERSION_DEBUG', 200, true);

    define('NC_VERSION_STRING', '0.04.200', true);
    
    define('NC_TABLE_PATH', 'json/', true);
    define('NC_SKIN_PATH', 'dyn_assets/skin/', true);

    define('NC_USER_PATH', "NC_TABLE_PATH/user/", true);
    define('NC_BLOG_PATH', "NC_TABLE_PATH/blog/", true);
    define('NC_BLOG_MD_PATH', "NC_BLOG_PATH/content/", true);

    define('NC_MODULE_PATH', "module/", true);

    define('NC_SKIN_CFG_PATH',NC_SKIN_PATH."/nc.skin.".NC_SKIN_NAME.".php", true);    
    

    
?>
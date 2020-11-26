<?php 

    require_once 'backend/base/nc.base.json.config.php';

    require_once dirname(__FILE__) . '/nc.config.version.php';
    require_once dirname(__FILE__) . '/nc.config.module.php';

    define('NC_SKIN_CFG_PATH', NC_SKIN_PATH."/nc.skin.".NC_SKIN_NAME.".php", true); 
    if(file_exists(NC_SKIN_CFG_PATH)) require_once NC_SKIN_CFG_PATH;

   // echo NC_SKIN_CFG_PATH; die();
?>
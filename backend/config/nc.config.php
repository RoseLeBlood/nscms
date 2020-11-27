<?php 
    require_once dirname(__FILE__) . '/nc.config.base.json.php';
    require_once dirname(__FILE__) . '/nc.config.version.php';
    require_once dirname(__FILE__) . '/nc.config.module.php';

    define('NC_SKIN_CFG_PATH', NC_SKIN_PATH."/nc.skin.".NC_SKIN_NAME.".php", true); 
    define('NC_SKIN_BASE_PATH', NC_SKIN_PATH . NC_SKIN_NAME);

    if(file_exists(NC_SKIN_CFG_PATH)) require_once NC_SKIN_CFG_PATH;

    setlocale(LC_CTYPE, NC_LOCALE);
?>
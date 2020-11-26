<?php 
    require_once dirname(__FILE__) . '/nc.config.base.php';
    require_once dirname(__FILE__) . '/nc.config.module.php';

    if(file_exists(NC_SKIN_CFG_PATH)) require_once NC_SKIN_CFG_PATH;

    require_once 'backend/base/nc.base.json.config.php';

    nc_base_json_config::load();
?>
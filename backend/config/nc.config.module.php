<?php 
    require_once 'backend/base/nc.base.file.json.php';
    require_once 'backend/module/nc.module.system.php';
    require_once 'backend/module/nc.module.item.php';

    nc_module_system::instance()->add_configs();
?>
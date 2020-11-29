<?php 
    require_once dirname(__FILE__) . '/../base/nc.base.file.json.php';
    require_once dirname(__FILE__) . '/../module/nc.module.system.php';
    require_once dirname(__FILE__) . '/../module/nc.module.item.php';

    nc_module_system::instance()->add_configs(false);
?>
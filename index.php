<?php 
    require_once "backend/config/nc.config.php";
    require_once "frontend/nc.front.page.main.php";

    $site = new nc_front_main();
    echo $site->setAndRender();
?>
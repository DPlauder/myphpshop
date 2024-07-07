<?php

require dirname(__DIR__, 2) . "/src/bootstrap.php";

use Dp\Webshop\Helper\Renderer;



Renderer::renderAdmin(ROOT_PATH . '/public/admin/views/admin.view.php',[
    'navigation' => $navigation_admin
]);
<?php

namespace Dp\Webshop\Helper;

class Renderer{
    public static function render(string $path, array $args = [], string $template = '/public/views/layouts/shop.main.php' ){
        ob_start();
        extract($args);
        require $path;
        $content = ob_get_contents();
        ob_clean();
        include dirname(__DIR__, 2) . $template;
    }
    public static function renderAdmin(string $path, array $args = [] ){
        ob_start();
        extract($args);
        require $path;
        $content = ob_get_contents();
        ob_clean();
        include dirname(__DIR__, 2) . '/public/admin/views/layouts/admin.main.php';
    }

    public static function e(string $output) {
        return htmlspecialchars($output, ENT_QUOTES, false);
    }
}
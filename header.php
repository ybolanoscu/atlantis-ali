<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php $title = wp_title('', false);
        echo !empty($title) ? $title : bloginfo('name'); ?></title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-117912115-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-117912115-1');
    </script>
    <?php wp_head(); ?>
</head>
<body data-src="">
<header>
    <section class="top_menu <?= isset($nav_class) ? $nav_class : '' ?>">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-top-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo get_home_url('/') ?>">
                        <img src="<?php echo get_bloginfo('template_directory'); ?>/images/pages/ALI.svg">
                    </a>
                </div>

                <?php add_filter('nav_menu_css_class', function ($class, $ref, $menu, $level) {
                    if ($menu->container_id === 'bs-top-menu') {
                        $class = array('dropdown');
                    }
                    $menu->link_after = '';
                    if ($level === 0 && $ref->has_children) {
                        $menu->link_after = ' <i class="pull-right fa fa-caret-down"></i>';
                    } elseif ($level === 1 && $ref->has_children) {
                        $menu->link_after = ' <i class="pull-right fa fa-caret-right"></i>';
                    }
                    return $class;
                }, 10, 4);
                add_filter('nav_menu_submenu_css_class', function ($class, $menu, $level) {
                    if ($menu->container_id === 'bs-top-menu') {
                        if ($level === 0) {
                            $class = array('dropdown-menu dropdown-big');
                        } elseif ($level === 1) {
                            $class = array('dropdown-menu');
                        }
                    }
                    return $class;
                }, 10, 3);
                if (has_nav_menu('top-menu')) {
                    wp_nav_menu(array(
                        'container' => 'div',
                        'theme_location' => 'top-menu',
                        'depth' => 3,
                        'container_class' => 'collapse navbar-collapse',
                        'container_id' => 'bs-top-menu',
                        'menu_class' => 'nav navbar-nav navbar-left',
                    ));
                }

                add_filter('nav_menu_css_class', function ($class, $ref, $menu, $level) {
                    if ($menu->container_id === 'bs-top-right-menu') {
                        $class = array('dropdown bg-dropdown');
                    }
                    return $class;
                }, 10, 4);
                add_filter('nav_menu_submenu_css_class', function ($class, $menu, $level) {
                    if ($menu->container_id === 'bs-top-right-menu') {
                        $class = array('dropdown-menu');
                    }
                    return $class;
                }, 10, 3);
                if (has_nav_menu('top-right-menu')) {
                    wp_nav_menu(array(
                        'theme_location' => 'top-right-menu',
                        'depth' => 2,
                        'container' => '',
                        'container_class' => '',
                        'container_id' => 'bs-top-right-menu',
                        'menu_class' => 'nav navbar-nav navbar-right',
                    ));
                } ?>
            </div>
        </nav>
    </section>
</header>


<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo('name');?> - <?php bloginfo('description');?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,200;0,300;0,400;0,500;1,200&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/picture/assets/src/library/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="/wp-content/themes/picture/assets/src/library/css/slick-theme.css" />

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    <section class="bg-primary">
        <div class="container">
            <header>
                <nav>
                    <a href="/">
                        <img src="/wp-content/themes/picture/assets/logo.png" alt="logo picture" />
                    </a>
                    <?php wp_nav_menu(array('theme_location' => 'menu_principal'));?>
                    <div class="menuIcons">
                        <ul>
                            <li><a class="iconfont icon-search" href="#"></a></li>
                            <li><a class="iconfont icon-store" href="#"></a></li>
                            <li><a class="iconfont icon-user" href="#"></a></li>
                            <?php pll_the_languages( array( 'hide_current' => 0, 'dropdown' => 1, 'display_names_as' => 'slug') );?>
                            </li>
                        </ul>
                    </div>
                </nav>
                <hr />
            </header>
    </section>
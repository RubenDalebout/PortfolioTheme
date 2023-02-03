<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title(); ?> | <?php bloginfo( 'name' ); ?></title>

    <?php wp_head(); ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark fixed-top" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="<?php echo get_site_url(); ?>">
                <img height="64" src="<?php echo get_template_directory_uri() . '/assets/images/theme_logo.png' ?>" alt="<?php _e('Logo portfolio', 'portfolio') ?>">
                <?php echo get_bloginfo( ('name') ); ?>
            </a>
            <button class="navbar-toggler hidden-lg-up" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <?php foreach(wp_get_nav_menu_items('primary') as $item) : ?>
                        <a class="nav-link" href="<?php echo $item->guid; ?>"><?php echo $item->post_title; ?></a>
                    <?php endforeach; ?>
                </ul>
                <div class="d-flex my-2 gap-3 my-lg-0 text-decoration-none">
                    <a href="#" class="text-white">
                        <i class="fa-brands fa-github fa-2xl"></i>
                    </a>
                    <a href="#" class="text-white">
                        <i class="fa-brands fa-instagram fa-2xl"></i>
                    </a>
                    <a href="#" class="text-white">
                        <i class="fa-brands fa-linkedin fa-2xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
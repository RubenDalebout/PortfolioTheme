<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title(); ?> | <?php bloginfo( 'name' ); ?></title>

    <?php wp_head(); ?>
</head>
<body theme="dark">
    <nav toggle="true">
        <div>
            <?php
            $menu_items = wp_get_nav_menu_items('Primary');
            foreach($menu_items as $menu_item) : ?>
                <button class="btn"><?php echo $menu_item->title; ?></button>
            <?php endforeach; ?>
        </div>
    </nav>

    <button menu-toggle class="btn">
        <i class="fa-solid fa-bars"></i>
    </button>
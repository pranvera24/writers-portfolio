<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@300&display=swap" rel="stylesheet">

    <title><?php bloginfo('name');?></title>

    <?php wp_head();?>

</head>


<body <?php body_class();?>>


<header class="main">
<h2>Writer's Name.</h2>
    
    <?php
        wp_nav_menu(array(
            'theme_location' => 'top-menu',
        ));
    ?>
</header>
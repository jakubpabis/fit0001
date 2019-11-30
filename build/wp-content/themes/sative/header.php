<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="google-site-verification" content="hE739HiXu6VX65tZVaXbcuFr1V2KY7SctLmkn91z7rg" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108874065-7"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-108874065-7');
    </script>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,500,500i,600,700,800,900&display=swap&subset=latin-ext" rel="stylesheet" media="none" onload="if(media!='all')media='all'">
    <noscript>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,500,500i,600,700,800,900&display=swap&subset=latin-ext" rel="stylesheet">
    </noscript>
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous" media="none" onload="if(media!='all')media='all'">
    <noscript>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    </noscript>-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
    <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/main.min.css?ver=1.06">
    <!--<script src="https://kit.fontawesome.com/7acc43e0e6.js" crossorigin="anonymous"></script>-->
</head>

<body <?php body_class(); ?>>
    <div id="wrapper" class="index m-scene">
        <?php get_template_part( 'template-parts/navigation' ); ?>
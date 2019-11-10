<?php
/**
 * Template Name: Diety
 */

get_header();

$products = wc_get_products( array(
    'limit' => 10,
    'orderby' => 'date',
    'order' => 'DESC',
    'return' => 'objects',
) );

$prod = $products[0];
var_dump($products);
var_dump($prod->get_variation_attributes()['pa_kalorycznosc']);

get_footer();
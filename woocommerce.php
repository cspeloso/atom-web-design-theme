<?php
/*
Template Name: Atom Shop
*/
    
    get_header();
    

    if(class_exists('WooCommerce')){
        //  add your custom code to display products
        echo '<h2>Shop Page</h2>';
        echo do_shortcode('[products]');
    }
    else{
        echo '<h2>WooCommerce is not active.</h2>';
    }
    
    get_footer();
    
?>
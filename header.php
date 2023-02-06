<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' href='/wp-content/themes/atom-web-design/assets/images/logo.png' />

    <!-- WP HEAD -->
    <?php 
        wp_head();
    ?>
</head>
<body>
    
<?php

    $html = "";

    if(function_exists('the_custom_logo'))
    {
        // the_custom_logo();
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo = wp_get_attachment_image_src($custom_logo_id, 'full')[0];
    }
    
    $footerSelection = get_theme_mod('atom_theme_header_selection', '1');
    
    if($footerSelection == 1)
    {
        $html .= "
            <div class='atom-header'>
                <div class='atom-logo-header'>
                    <img src='{$logo}' alt='Atom Web Design Logo' />
                </div>
                <div class='atom-header-bar-collapse-menu'>
                    <i class='fa-solid fa-bars'></i>
                </div>";
                
                    ob_start();
                    
                    //  gets primary menu
                    wp_nav_menu(
                        array(
                            'menu' => 'primary',
                            'container' => '',
                            'theme_location' => 'primary',
                            'items_wrap' => '<div class="atom-header-bar-buttons"><div class="atom-header-bar-collapse-exit">X</div>%3$s</div>'
                        )
                    );
                    
                    $html .= ob_get_clean();
                    
        $html .= "</div>";
    }
    else if($footerSelection == 2)
    {
        $headerAddr = get_theme_mod('atom_theme_header_address', '');
        $headerPhone = get_theme_mod('atom_theme_header_phone', '');
        
        $html .= "
            <div class='atom-header second'>
                <div class='atom-logo-header'>
                    <img src='{$logo}' alt='Atom Web Design Logo' />
                </div>
                <div class='atom-header-bar-collapse-menu'>
                    <i class='fa-solid fa-bars'></i>
                </div>
                
                <div class='atom-header-bar-buttons'>
                    <div class='atom-header-bar-phone-and-address'>";
                        if($headerAddr != '')
                            $html .= "<a href='https://maps.google.com/?q={$headerAddr}' target='_blank' class='atom-header-bar-address'>$headerAddr</a>";
                        if($headerPhone != '')
                            $html .= "<a href='tel:+1{$headerPhone}' class='atom-header-bar-phone'>{$headerPhone}</a>";
                    $html .= "</div>";
                
                    ob_start();
                    
                    //  gets primary menu
                    wp_nav_menu(
                        array(
                            'menu' => 'primary',
                            'container' => '',
                            'theme_location' => 'primary',
                            'items_wrap' => '<div class="atom-header-bar-buttons-inner"><div class="atom-header-bar-collapse-exit">X</div>%3$s</div>'
                        )
                    );
                    
                    $html .= ob_get_clean();
                    
        $html .= "</div></div>";
        
    }
  
  echo $html;
  
  
  
?>
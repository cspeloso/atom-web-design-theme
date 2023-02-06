<?php

    //  prints out an error log for only admins to see
    function atom_error($object) {
        if(current_user_can('manage_options')) 
        {
            var_dump($object);
        }
    }

    function atom_web_design_theme_support() {
        
        //  Adds dynamic title tag support
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');
    }
    add_action('after_setup_theme', 'atom_web_design_theme_support');


    //  enqueues our stylesheets
    function atom_web_design_register_styles() {
        
        $version = wp_get_theme()->get('Version');
        //  get_template_directory_uri gets path up to theme's directory.
        wp_enqueue_style('atomwebdesign-styles', get_template_directory_uri() . '/style.css', array('atomwebdesign-fontawesome'), $version, 'all');
        wp_enqueue_style('atomwebdesign-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css', array(), '6.1.1', 'all');
    }
    add_action('wp_enqueue_scripts', 'atom_web_design_register_styles');
    
    function theme_customizer_css() {
        
        $primary = get_theme_mod( 'primary_color', '#30508C' );
        $secondary = get_theme_mod('secondary_color', '#FFFFFF');
        $tertiary = get_theme_mod('tertiary_color', '#DBDBDB');
        $header = get_theme_mod('header_color', 'white');
        $headerText = get_theme_mod('header_text_color', 'gray');
        
        $custom_css = "
            :root{
                --atom-primary:{$primary};
                --atom-secondary:{$secondary};
                --atom-tertiary:{$tertiary};
                --atom-header:{$header};
                --atom-header-text:{$headerText};
            }";
            
        wp_add_inline_style( 'atomwebdesign-styles', $custom_css );
    }
    add_action('wp_enqueue_scripts', 'theme_customizer_css' );


    //  enqueues our scripts
    function atom_web_design_register_scripts() {
        
        $version = wp_get_theme()->get('Version');
        wp_enqueue_script('atomwebdesign-script', get_template_directory_uri() . '/assets/js/script.js', array('atomwebdesign-jquery'), $version, true);
        wp_enqueue_script('atomwebdesign-jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), '3.6.0', true);
        
    }
    add_action('wp_enqueue_scripts', 'atom_web_design_register_scripts');
    
    
    //  menus
    function atom_web_design_menus() {
        $locations = array(
            'primary' => "Primary top header",
            'footer' => 'Footer Menu Items'
        );
        
        register_nav_menus($locations);
    }
    add_action('init', 'atom_web_design_menus');
    
    
    //  elementor??
    function your_theme_setup() {
        add_theme_support( 'elementor' );
    }
    add_action( 'after_setup_theme', 'your_theme_setup' );
    
    
    //  customize theme
    function theme_customizer($wp_customize) {

        
        //  COLORS
        //  add section
        $wp_customize->add_section('theme_colors', array(
            'title' => __('Theme Colors', 'text_domain'),
            'priority' => 30
        ));
        
        //  add settings
        $wp_customize->add_setting('primary_color', array(
            'default' => '#30508C',
            'transport' => 'refresh'
        ));
        $wp_customize->add_setting('secondary_color', array(
            'default' => '#FFFFFF',
            'transport' => 'refresh'
        ));
        $wp_customize->add_setting('tertiary_color', array(
            'default' => '#DBDBDB',
            'transport' => 'refresh'
        ));
        $wp_customize->add_setting('header_color', array(
            'default' => 'white',
            'transport' => 'refresh'
        ));
        $wp_customize->add_setting('header_text_color', array(
             'default' => 'black',
             'transport' => 'refresh'
        ));
        $wp_customize->add_setting('alt_logo', array(
            'default' => '',
            'transport' => 'refresh',
        ));
        
        
        //  add controls
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize, 
            'primary_color', 
            array(
                'label' => __('Primary Color', 'text_domain'),
                'section' => 'theme_colors',
                'settings' => 'primary_color'
            )
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'secondary_color',
            array(
               'label' => __('Secondary Color', 'text_domain'),
               'section' => 'theme_colors',
               'settings' => 'secondary_color'
           )
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'tertiary_color',
            array(
                'label' => __('Tertiary Color', 'text_domain'),
                'section' => 'theme_colors',
                'settings' => 'tertiary_color'
            )
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'header_color',
            array(
                'label' => __('Header Color', 'text_domain'),
                'section' => 'theme_colors',
                'settings' => 'header_color'
            )
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'header_text_color',
            array(
                'label' => __('Header Text Color', 'text_domain'),
                'section' => 'theme_colors',
                'settings' => 'header_text_color'
            )
        ));
        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'alt_logo',
                array(
                    'label' => __( 'Alternative Logo', 'text_domain' ),
                    'section' => 'title_tagline',
                    'settings' => 'alt_logo'
                )
            )
        );
        // END COLORS
        
        // HEADER SETTINGS
        $wp_customize->add_section('atom_theme_header', array(
            'title' => __('Header Style', 'text_domain')
        ));
        
        $wp_customize->add_setting('atom_theme_header_selection', array(
           'default' => '1' 
        ));
        
        $wp_customize->add_control('atom_theme_header_selection', array(
           'label' => 'Header Style Selector',
           'section' => 'atom_theme_header',
           'type' => 'select',
           'choices' => array(
                '1' => __('Header with Links and Logo'),
                '2' => __('Header with Links, Logo, Phone and Address')
           )
        ));
        
            if(get_theme_mod('atom_theme_header_selection', '1') == '2')
            {
                $wp_customize->add_setting('atom_theme_header_address', array(
                   'default' => '' 
                ));
                $wp_customize->add_setting('atom_theme_header_phone', array(
                    'default' => ''    
                ));
                
                $wp_customize->add_control('atom_theme_header_phone', array(
                   'label' => 'Header Phone',
                   'section' => 'atom_theme_header',
                   'type' => 'text'
                ));
                $wp_customize->add_control('atom_theme_header_address', array(
                   'label' => 'Header Address',
                   'section' => 'atom_theme_header',
                   'type' => 'text'
                ));
                
            }
        
        // END HEADER SETTINGS
                
        // FOOTER SETTINGS
        $wp_customize->add_section('atom_theme_footer', array(
           'title' => __('Footer Style', 'text_domain')
        ));

        
        $wp_customize->add_setting('atom_theme_footer_selection', array(
            'default' => '1'
        ));
        $wp_customize->add_setting('atom_theme_subfooter_disabled', array(
            'default' => '0' 
        ));
        $wp_customize->add_setting('atom_footer_business_address_1', array(
           'default' => 'Address 1' 
        ));
        $wp_customize->add_setting('atom_footer_business_address_2', array(
           'default' => '' 
        ));
        $wp_customize->add_setting('atom_footer_business_city', array(
           'default' => 'City' 
        ));
        $wp_customize->add_setting('atom_footer_business_state', array(
           'default' => 'State' 
        ));
        $wp_customize->add_setting('atom_footer_business_zipcode', array(
           'default' => 'Zipcode' 
        ));
        
        
        $wp_customize->add_control('atom_theme_footer_selection', array(
            'label' => 'Footer Style Selector',
            'section' => 'atom_theme_footer',
            'type' => 'select',
            'choices' => array(
                '1' => __('Simple Footer'),
                '2' => __('More Complex Footer'),
                '3' => __('Socials, Business location, button')
            )
        ));
        $wp_customize->add_control('atom_footer_business_address_1', array(
            'label' => 'Footer Address 1',
            'section' => 'atom_theme_footer',
            'type' => 'text'
        ));
        $wp_customize->add_control('atom_footer_business_address_2', array(
            'label' => 'Footer Address 2',
            'section' => 'atom_theme_footer',
            'type' => 'text'
        ));
        $wp_customize->add_control('atom_footer_business_city', array(
            'label' => 'Footer City',
            'section' => 'atom_theme_footer',
            'type' => 'text'
        ));
        $wp_customize->add_control('atom_footer_business_state', array(
            'label' => 'Footer State',
            'section' => 'atom_theme_footer',
            'type' => 'text'
        ));
        $wp_customize->add_control('atom_footer_business_zipcode', array(
            'label' => 'Footer Zipcode',
            'section' => 'atom_theme_footer',
            'type' => 'text'
        ));
        $wp_customize->add_control('atom_theme_subfooter_disabled', array(
           'label' => 'Subfooter Message',
           'section' => 'atom_theme_footer',
           'type' => 'checkbox',
           'priority' => 1000
        ));
        
        
        // SOCIAL LINKS
        $wp_customize->add_section('atom_footer_facebook_link', array(
            'title' => __('Facebook Link', 'text_domain')
        ));
        $wp_customize->add_section('atom_footer_instagram_link', array(
            'title' => __('Instagram Link', 'text_domain')
        ));
        $wp_customize->add_section('atom_footer_linkedin_link', array(
            'title' => __('LinkedIn Link', 'text_domain')
        ));
        $wp_customize->add_section('atom_footer_phone_link', array(
            'title' => __('Phone Number', 'text_domain')
        ));
        $wp_customize->add_section('atom_footer_email_link', array(
            'title' => __('Email Address', 'text_domain')
        ));
        
        
        $wp_customize->add_setting('atom_footer_facebook_textbox', array(
            'default' => '' 
        ));
        $wp_customize->add_setting('atom_footer_instagram_textbox', array(
            'default' => '' 
        ));
        $wp_customize->add_setting('atom_footer_linkedin_textbox', array(
            'default' => '' 
        ));
        $wp_customize->add_setting('atom_footer_phone_textbox', array(
            'default' => '' 
        ));
        $wp_customize->add_setting('atom_footer_email_textbox', array(
            'default' => '' 
        ));
        
        
        $wp_customize->add_control('atom_footer_facebook_textbox', array(
            'label' => 'Facebook Link',
            'section' => 'atom_theme_footer',
            'type' => 'text'
        ));
        $wp_customize->add_control('atom_footer_instagram_textbox', array(
            'label' => 'Instagram Link',
            'section' => 'atom_theme_footer',
            'type' => 'text'
        ));
        $wp_customize->add_control('atom_footer_linkedin_textbox', array(
            'label' => 'LinkedIn Link',
            'section' => 'atom_theme_footer',
            'type' => 'text'
        ));
        $wp_customize->add_control('atom_footer_phone_textbox', array(
            'label' => 'Phone Number',
            'section' => 'atom_theme_footer',
            'type' => 'text'
        ));
        $wp_customize->add_control('atom_footer_email_textbox', array(
            'label' => 'Email Address',
            'section' => 'atom_theme_footer',
            'type' => 'text'
        ));
        //  END SOCIAL LINKS
        // END FOOTER SETTINGS
        
        
        $wp_customize->add_setting( 'custom_logo_size', array(
            'default' => '250x150',
        ));
        
        
        
        
        
        
        
    }
    add_action('customize_register', 'theme_customizer');
    
    //  adds logo size as image dimensions
    add_image_size('atom-theme-logo', 250, 150, true);
    
    
    
    
    
    
    
    
?>
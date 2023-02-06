<?php
    
    $menu_id = get_theme_mod('nav_menu_locations')['footer'];
    $menu = wp_get_nav_menu_object($menu_id);
    $menu_items = wp_get_nav_menu_items($menu->term_id);
       
    $html = "";
    
    $footerSelection = get_theme_mod('atom_theme_footer_selection', '1');
                
    //  displays footer similar to atomri.com
    if($footerSelection == '1')
    {
        $html .= "
            <div class='atom-footer'>

                <div class='atom-footer-inner'>
            
                    <div class='atom-links'>
            
                        <div class='atom-footer-logo-container'>
                            <img class='atom-footer-logo' src='" . esc_url(get_theme_mod('alt_logo', '')) . "' alt='atomri_logo' />
                        </div>
            
                        <div class='atom-footer-links-container'>";
            
                            foreach((array)$menu_items as $key=>$menu_item)
                                $html .= "<a href='{$menu_item->url}'>{$menu_item->title}</a>";
                                
                        $html .= "
                        </div>
            
                    </div>
            
                    <div class='atom-socials'>
            
                        <ul class='social-icons'>";
                        
                            // dynamic_sidebar('atom-footer-widget');
                            $socialLinks = array();
                            
                            //  Check for facebook link
                            $facebookLink = get_theme_mod('atom_footer_facebook_textbox', '');
                            if($facebookLink != '')
                                $socialLinks[$facebookLink] = 'fa-brands fa-facebook-f';
                                
                            $instagramLink = get_theme_mod('atom_footer_instagram_textbox', '');
                            if($instagramLink != '')
                                $socialLinks[$instagramLink] = 'fa-brands fa-instagram';
                                
                            $linkedInLink = get_theme_mod('atom_footer_linkedin_textbox', '');
                            if($linkedInLink != '')
                                $socialLinks[$linkedInLink] = 'fa-brands fa-linkedin-in';
                                
                            $phoneNum = get_theme_mod('atom_footer_phone_textbox', '');
                            if($phoneNum != '')
                                $socialLinks["tel:+1" . $phoneNum] = 'fa-solid fa-phone';
                                
                            $emailLink = get_theme_mod('atom_footer_email_textbox', '');
                            if($emailLink != '')
                                $socialLinks["mailto:" . $emailLink] = 'fa-solid fa-envelope';
                
                            foreach($socialLinks as $socialLink => $icon)
                            {
                                $html .= "
                                    <li>
                                        <a href='$socialLink' target='_blank'> 
                                            <i class='$icon'></i>
                                        </a>
                                    </li>";
                            }
                        $html .= "
                        </ul>
            
                        <p class='atom-copyright'>Copyright &copy; <?php echo date('Y') ?>, <?php echo get_bloginfo('name'); ?></p>
            
                    </div>
            
                </div>
            
            </div>";
    }
    
    //  displays footer similar to shift4tomorrow.
    else if($footerSelection == '2')
    {
        $html .= "
            <div class='atom-footer-2'>
                
                <div class='atom-footer-2-inner'>
                    
                    <div class='atom-footer-2-logo-and-socials'>
                        <div class='atom-footer-2-logo-container'>
                            <img src='" . esc_url(get_theme_mod('alt_logo', '')) . "' alt='atomri_logo' />
                        </div>
                        <div class='atom-footer-2-socials'>
                            
                            <ul class='social-icons'>";
                        
                                // dynamic_sidebar('atom-footer-widget');
                                $socialLinks = array();
                                
                                //  Check for facebook link
                                $facebookLink = get_theme_mod('atom_footer_facebook_textbox', '');
                                if($facebookLink != '')
                                    $socialLinks[$facebookLink] = 'fa-brands fa-facebook-f';
                                    
                                $instagramLink = get_theme_mod('atom_footer_instagram_textbox', '');
                                if($instagramLink != '')
                                    $socialLinks[$instagramLink] = 'fa-brands fa-instagram';
                                    
                                $linkedInLink = get_theme_mod('atom_footer_linkedin_textbox', '');
                                if($linkedInLink != '')
                                    $socialLinks[$linkedInLink] = 'fa-brands fa-linkedin-in';
                                
                                $phoneNum = get_theme_mod('atom_footer_phone_textbox', '');
                                if($phoneNum != '')
                                    $socialLinks["tel:+1" . $phoneNum] = 'fa-solid fa-phone';
                                    
                                $emailLink = get_theme_mod('atom_footer_email_textbox', '');
                                if($emailLink != '')
                                    $socialLinks["mailto:" . $emailLink] = 'fa-solid fa-envelope';
                    
                                foreach($socialLinks as $socialLink => $icon)
                                {
                                    $html .= "
                                        <li>
                                            <a href='$socialLink' target='_blank'> 
                                                <i class='$icon'></i>
                                            </a>
                                        </li>";
                                }
                                
                            $html .= "
                                </ul>
                            </div>
                    </div>
                    
                    <div class='atom-footer-2-contact-info'>
                        <p>" . get_theme_mod('atom_footer_business_address_1', 'Address 1') . "</p>";
                        $line2 = get_theme_mod('atom_footer_business_address_2', '');
                        if($line2 != '')
                            $html .= "<p>{$line2}</p>";
                        $html .= "
                        <p>" . get_theme_mod('atom_footer_business_city', 'City') . ', ' . get_theme_mod('atom_footer_business_state', 'State') . "</p>
                        <p>" . get_theme_mod('atom_footer_business_zipcode', 'Zipcode') . "</p>
                    </div>
                    
                    <div class='atom-footer-2-footer-menu-links'>";
                        
                            foreach($menu_items as $key=>$menu_item)
                                $html .= "<a href='{$menu_item->url}'>{$menu_item->title}</a>";
                        
                    $html .= "
                    </div>
                    
                    <div class='atom-footer-2-button'>
                        <a class='atom-primary' href='" . get_permalink(get_page_by_title('shop')) . "' >Shop Now</a>
                    </div>
                    
                </div>
                
            </div>";
    }
    
    //  displays footer similar to darsteelco
    else if($footerSelection == '3')
    {
        $html .= "
        
            <div class='atom-footer-3'>
            
                <div class='atom-footer-3-inner'>
                
                    <div class='atom-footer-3-section left'>
                        
                            <div class='atom-footer-3-logo-container'>
                                <img src='" . esc_url(get_theme_mod('alt_logo', '')) . "' alt='atomri_logo' />
                            </div>
                            
                            <div class='atom-footer-2-socials'>
                                
                                <ul class='social-icons'>";
                            
                                    $socialLinks = array();
                                    
                                    //  Check for facebook link
                                    $facebookLink = get_theme_mod('atom_footer_facebook_textbox', '');
                                    if($facebookLink != '')
                                        $socialLinks[$facebookLink] = 'fa-brands fa-facebook-f';
                                        
                                    $instagramLink = get_theme_mod('atom_footer_instagram_textbox', '');
                                    if($instagramLink != '')
                                        $socialLinks[$instagramLink] = 'fa-brands fa-instagram';
                                        
                                    $linkedInLink = get_theme_mod('atom_footer_linkedin_textbox', '');
                                    if($linkedInLink != '')
                                        $socialLinks[$linkedInLink] = 'fa-brands fa-linkedin-in';
                                    
                                    $phoneNum = get_theme_mod('atom_footer_phone_textbox', '');
                                    if($phoneNum != '')
                                        $socialLinks["tel:+1" . $phoneNum] = 'fa-solid fa-phone';
                                        
                                    $emailLink = get_theme_mod('atom_footer_email_textbox', '');
                                    if($emailLink != '')
                                        $socialLinks["mailto:" . $emailLink] = 'fa-solid fa-envelope';
                        
                                    foreach($socialLinks as $socialLink => $icon)
                                    {
                                        $html .= "
                                            <li>
                                                <a href='$socialLink' target='_blank'> 
                                                    <i class='$icon'></i>
                                                </a>
                                            </li>";
                                    }
                                    
                                $html .= "
                                </ul>
                            </div>
                    </div>
                    
                    <div class='atom-footer-3-section middle'>
                    
                        <div class='atom-footer-3-business-info'>
                        
                            <p>" . get_theme_mod('atom_footer_business_address_1', 'Address 1') . "</p>";
                            $line2 = get_theme_mod('atom_footer_business_address_2', '');
                            if($line2 != '')
                                $html .= "<p>{$line2}</p>";
                            $html .= "
                            <p>" . get_theme_mod('atom_footer_business_city', 'City') . ', ' . get_theme_mod('atom_footer_business_state', 'State') . "</p>
                            <p>" . get_theme_mod('atom_footer_business_zipcode', 'Zipcode') . "</p>
                        
                        </div>
                    
                    </div>
                    
                    <div class='atom-footer-3-section right'>
                    
                        <a class='atom-primary' href='" . get_permalink(get_page_by_title('contact')) . "' >Quote</a>
                    
                    </div>
                    
                </div>
                
            </div>";
    }
    
    
    //  adds our 'powered by' sub-footer.
    if(get_theme_mod('atom_theme_subfooter_disabled') != 0)
        $html .= "<div class='atom-web-sub-footer'>
                    <p>Powered by <a href='https://atomri.com/' target='_blank'>Atom Web Design</a></p>
                </div>";
    
    echo $html;
?>


<?php wp_footer(); ?>

</body>
</html>

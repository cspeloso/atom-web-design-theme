<?php

    get_header();
    
?>

    
    <div class='atom-page-container'>
        
        <?php
        
            //  if we have posts...
            if(have_posts())
            {
                while(have_posts())
                {
                    the_post();
                    
                    $postType = get_post_type();
                    // echo $postType;
                    
                    switch($postType)
                    {
                        case 'post':
                            get_template_part('template-parts/content', 'article');
                            break;
                        case 'product':
                            get_template_part('template-parts/content', 'product');
                            break;
                    }
                    
                    
                }
            }
        
        ?>
        
    </div>
    
<?php

    get_footer();
    
?>
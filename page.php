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
                    
                    
                    get_template_part('template-parts/content', 'page');
                    
                }
            }
        
        ?>
        
    </div>
    
<?php

    get_footer();
    
?>
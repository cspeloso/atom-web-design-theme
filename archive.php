<?php

    get_header();
    
?>

    
    <div class='atom-page-container'>
        
        <div class='atom-archive-inner'>
            <?php
            
                //  if we have posts...
                if(have_posts())
                {
                    while(have_posts())
                    {
                        the_post();
                        
                        get_template_part('template-parts/content', 'archive');
                        
                    }
                }
            
            ?>
        </div>
        
    </div>
    
<?php

    get_footer();
    
?>
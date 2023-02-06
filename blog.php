<?php

    get_header();
    
?>

    
    <div class='atom-page-container white'>
        
        <h1 class='atom-blog-post-archive-title'>Blog Posts</h1>
        
        <div class='atom-archive-inner'>
            <?php
                
                the_posts_pagination();
            
                //  if we have posts...
                if(have_posts())
                {
                    while(have_posts())
                    {
                        the_post();
                            
                        get_template_part('template-parts/content', 'archive');
                        
                    }
                }
                
                the_posts_pagination();
                
            ?>
            
        </div>
        
    </div>
    
<?php

    get_footer();
    
?>
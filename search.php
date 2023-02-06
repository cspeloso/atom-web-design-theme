<?php

    get_header();
    
?>

    
    <div class='atom-page-container'>
        
        <h1>Search Results</h1>

        <div class='atom-archive-inner'>
            <?php
            
                //  if we have posts...
                if(have_posts())
                {
                    while(have_posts())
                    {
                        the_post();
                        
                        get_template_part('template-parts/content', 'search');
                        
                    }
                }
            
            ?>
        </div>
        
    </div>
    
<?php

    get_footer();
    
?>
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
                    the_content();
                }
            }
        
        ?>
        
    </div>
    
<?php

    get_footer();
    
?>

    
<div class='atom-post-archive-container'>
    
    <div class='atom-blog-post-image-container'>
        <img class='atom-blog-post-image' src='<?php echo get_the_post_thumbnail_url(); ?>' alt='Blog post thumbnail image' />
    </div>
    
    <div class='atom-blog-post-preview-info'>
        
        <!--Article Title-->
        <h2 class='atom-blog-post-archive-title'><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h2>
        
        <!--Article Date-->
        <span class='atom-blog-post-archive-release-date'><?php echo the_date('M jS, Y'); ?></span>
        
        <!--Article Comments-->
        <span class='atom-blog-post-archive-comments-preview'><?php comments_number(); ?></span>
        
        <!--Article Excerpt-->
        <p class='atom-blog-post-archive-excerpt'><?php echo get_the_excerpt(); ?></p>
        
        <a class='atom-post-read-more' href='<?php the_permalink(); ?>'>Read More</a>
        
    </div>
    
</div>
<?php
    $encodedBlogUrl = urlencode(get_the_permalink());
    $encodedBlogQuote = urlencode(get_the_excerpt());
?>

<div class='blog-post-container'>
    <div class='blog-post-container-inner'>
        <a href='/blog' class='back-button'><i class='fa fa-arrow-left' aria-hidden='true'></i> Back to all posts</a>
        <img class='splash-img' src='<?php echo get_the_post_thumbnail_url(); ?>' alt='Blog post title image' />
        <div class='blog-post'>
            <h1 class='title'><?php echo get_the_title(); ?></h1>
            
            <?php
                
                //  prints out the tags
                the_tags('<span class="atom-blog-tag"><i class="fa fa-tag"></i>', '</span><span class="atom-blog-tag"><i class="fa fa-tag"></i>', "</span>");
            
            ?>

            <div class='share-buttons'>
                <ul class='share-buttons' data-source='simplesharingbuttons.com'>
                    <li class='facebook'>
                        <a href='https://www.facebook.com/sharer/sharer.php?u=<?php echo $encodedBlogUrl; ?>&quote=<?php echo $encodedBlogQuote; ?>' title='Share on Facebook' target='_blank'>
                            <i class='fa-brands fa-facebook-f'></i>
                        </a>
                    </li>
                    <li class='twitter'>
                        <a href='https://twitter.com/intent/tweet?source=<?php echo $encodedBlogUrl; ?>&text=<?php echo $encodedBlogQuote; ?>' target='_blank' title='Tweet'>
                            <i class='fa-brands fa-twitter'></i>
                        </a>
                    </li>
                    <li class='reddit'>
                        <a href='http://www.reddit.com/submit?url=<?php echo $encodedBlogUrl; ?>&title=<?php echo $result['title']; ?>' target='_blank' title='Submit to Reddit'>
                            <i class='fa-brands fa-reddit-alien'></i>
                        </a>
                    </li>
                    <li class='linkedin'>
                        <a href='http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $encodedBlogUrl ?>&title=<?php echo $result['title']; ?>&summary=<?php echo $result['shortDescription']; ?>&source=<?php echo $encodedBlogUrl; ?>' target='_blank' title='Share on LinkedIn'>
                            <i class='fa-brands fa-linkedin-in'></i>
                        </a>
                    </li>
                </ul>
            </div>
            <p class='release-date'><?php echo the_date('M jS, Y'); ?></p>
            <p class='description'><?php echo get_the_excerpt(); ?></p>
            
            <?php
                the_content();
            ?>
        </div>
        
        <?php
        
            //  if comments are enabled, show the comments form
            if(comments_open())
            {
                comments_template();    
            }
        
        ?>
        
        
        
    </div>
</div>
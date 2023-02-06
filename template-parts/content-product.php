<div class='blog-post-container'>
    <div class='blog-post-container-inner'>
        <h1><?php echo get_the_title(); ?></h1>
        <div class='blog-post'>
            <?php
                the_content();
            ?>
        </div>
    </div>
</div>
<div class='atom-product-container'>
    <div class='atom-product-container-inner'>
        <h1 class='atom-product-title'><?php echo get_the_title(); ?></h1>
        <div class='blog-post'>
            <?php
                the_content();
            ?>
        </div>
    </div>
</div>
<div class='atom-comments-container'>
    
    <div class='atom-comments-inner'>
        
        <!--Comment reply title-->
        <div class='atom-comments-header <?php if(have_comments()) echo 'atom-gray-border-bottom'; ?>'>
            
            <h2 class='atom-comments-reply-title'>
                
                <?php 
                    if(!have_comments())
                    {
                        echo "Leave a Comment";
                    }
                    else {
                        comments_number() . " Comments";
                    }
                ?>
                
            </h2>
            
        </div>
        
        <div class='atom-comments-inner'>
            
            <?php
            
                wp_list_comments(
                    array(
                        'avatar_size' => 50,
                        'style' => 'div'
                    )
                );
            
            ?>
            
        </div>
        
        <div class='atom-comments-respond'>
            <?php
            
                if(comments_open()){
                    comment_form(
                        array(
                            'class_form' => '',
                            'title_reply_before' => '<h2 id="reply_title" class="atom-comments-reply-title">',
                            'title_reply_after' => '</h2>'
                        )
                    );
                }
            
            ?>
            
        </div>
        
        
        
    </div>
    
    
    
</div>

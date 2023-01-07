          <?php if (have_posts()) :
              while (have_posts()) : the_post(); 
          ?>

          <div class="col-md-4">
            <div class="blog_area">

              <div class="post_details">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              </div>
              <div class="post_thumb">
                <a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail('post-thumbnails'); ?></a>
              </div>
              <div class="post-img">

                <?php                
                  
                  $args = array(
                      'post_parent'    => get_the_ID(),
                      'post_type' => 'attachment',
                      'post_status'    => 'any',
                      'numberposts'    => -1, 
                      'post_mime_type' => 'image',
                      'order' => 'ASC',
                      'orderby' => 'menu_order ID',
                  );
                  $attachments = get_posts( $args );

                  foreach ( $attachments as $attachment ) {
                      $full_img_url = wp_get_attachment_url( $attachment->ID );                     
                                  
                  ?>
                <a href="<?php echo $full_img_url;?>"
                  target="_blank"><?php echo wp_get_attachment_image($attachment->ID, 'full'); ?>                  
                </a>
                <?php
                }
                ?>
              </div>          
              
              <div class="post-img">

                <?php                
                  
                  $args = array(
                      'post_parent'    => get_the_ID(),
                      'post_type' => 'attachment',
                      'post_status'    => 'any',
                      'numberposts'    => -1, 
                      'post_mime_type' => 'image',
                      'order' => 'ASC',
                      'orderby' => 'menu_order ID',
                  );
                  $attachments = get_post_galleries( $args );

                  

                  foreach ( $attachments as $attachment ) {
                      $full_img_url = wp_get_attachment_url( $attachment->ID );                     
                  
                
                  ?>
                <a href="<?php echo $full_img_url;?>"
                  target="_blank"><?php echo wp_get_attachment_image($attachment->ID, 'full'); ?>                  
                </a>
                <?php
                }
                ?>
              </div>   

              <!-- Images From Gallery -->
              



              <div class="post_details">                
                <?php the_excerpt(); ?>
              </div>
              <div class="author">
                <span class="dashicons dashicons-calendar-alt"></span> <?php echo get_the_date( );?>  <?php echo ' ',the_time( 'g:i a' );?><br>
                <span class="dashicons dashicons-admin-users"></span> <?php echo get_the_author();?>
                <span class="dashicons dashicons-edit"></span>
              </div>
            </div>
          </div>
          <?php endwhile;
            else :
              _e('No post found');
            endif; ?>
          <div id="page_nav">
            <?php if ('ali_pagenav') {ali_pagenav(); } else{ ?>
            <?php next_posts_link(); ?>
            <?php previous_posts_link(); ?>
            <?php } ?>
          </div>


       
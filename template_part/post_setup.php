          <?php 
          
          // include_once('cf.php');         
          
          
          if (have_posts()) :
              while (have_posts()) : the_post(); ?>

          <div class="blog_area_post">
            <div class="post_details">
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </div>
            <div class="post_thumb">
              <a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail('post-thumbnails'); ?></a>
            </div>
            <div class="post_details">
              <?php the_content(); ?>
            </div>
          </div>
          <?php endwhile;
            else :
              _e('No post found');
            endif; ?>


<?php

function usp_display_images($content) { 
    global $post;
    $args = array('order'=>'ASC', 'post_type'=>'attachment', 'post_parent'=>$post->ID, 'post_mime_type'=>'image', 'post_status'=>null); 
    $items = get_posts($args); ?>
  
         <div class="usp-image">
         <?php 
         foreach ($items as $item) {
              $atts = wp_get_attachment_image_src($item->ID, 'medium');
              $full = wp_get_attachment_image_src($item->ID, 'full'); ?>
              <a href="<?php echo $full[0]; ?>">
                <img src="<?php echo $atts[0]; ?>" width="<?php echo $atts[1]; ?>" height="<?php echo $atts[2]; ?>" alt="">
              </a>
         <?php 
         }
              $author = get_post_meta($post->ID, 'user_submit_name', true);
              $url = get_post_meta($post->ID, 'user_submit_url', true);
              if (filter_var($url, FILTER_VALIDATE_URL) !== false) {
              echo '<span class="usp-author-link">Posted by <a href="' . $url . '">' . $author . '</a></span> ';
         } 
         ?>
         </div>
  
  <?php 
  return $content; 
  }
  add_filter('the_content', 'usp_display_images');
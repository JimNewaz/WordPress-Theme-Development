<?php
/*
* The main template file
*/ 
get_header(); ?>
  
  <section id="body_area">
    <div class="container">
      <div class="row">        
        <?php 
        get_template_part('template_part/blog_setup'); 
        ?>       
      </div>
    </div>
  </section>

  <?php get_footer(); ?>
<?php get_header(); ?>
  <body <?php body_class(); ?>>

 <?php get_template_part( '/template-parts/common/hero' ); ?>
    
    <!-- post start -->
    <div class="posts">
    <?php
      while ( have_posts() ) {
        the_post();
        get_template_part( '/post-formats/content', get_post_format() );
      } 
     ?>
    </div>
    <!-- post.end -->

    <!-- pagination start -->
    <div class="pagination">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <?php 
             the_posts_pagination( array(
              //  'screen_reader_text' => '',
              //  'prev_text' => 'Old Posts',
              //  'next_text' => 'New Posts',
             ) );
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- pagination.end -->

   <?php get_footer(); ?>
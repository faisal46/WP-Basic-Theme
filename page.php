<?php get_header(); ?>
  <body <?php body_class(); ?>>

 <?php get_template_part( "hero" ); ?>
    
    <!-- post start -->
    <div class="posts">
    <?php
      while( have_posts() ){
        the_post();
    ?>
    <div class="post" <?php post_class(); ?>>
      <div class="container">

      <div class="row">
          <div class="col-md-12 text-center mb-3">
            <h2 class="post-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <p class="post-author"><strong><?php the_author(); ?></strong></p>
            <p class="post-date"><?php echo get_the_date(); ?></p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 text-center overflow-hidden">
            <?php 
              if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'full' );
              }
              
              the_content();

            ?>
          </div>
        </div>

      </div>
    </div>
    <?php  } ?>
    </div>
    <!-- post.end -->

   <?php get_footer(); ?>
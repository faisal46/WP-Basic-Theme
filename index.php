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
          <div class="col-md-12">
            <h2 class="post-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <p class="post-author"><strong><?php the_author(); ?></strong></p>
            <p class="post-date"><?php echo get_the_date(); ?></p>
            <p class="post-category"><?php the_category(); ?></p>
            <?php 
             echo get_the_tag_list("<ul><li>","</li><li>", "</li></ul>");
              ?>
          </div>

          <div class="col-md-8 overflow-hidden">
            <?php 
              if( has_post_thumbnail() ){
                the_post_thumbnail( 'full' );
              }
              
              the_excerpt();

              // if( !post_password_required() ){
              //   the_excerpt();
              // }else{
              //   echo get_the_password_form();
              // }

            ?>
          </div>
        </div>

      </div>
    </div>
    <?php  } ?>
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
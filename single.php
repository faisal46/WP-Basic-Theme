<?php get_header(); ?>
  <body <?php body_class(); ?>>

  <?php get_template_part( "hero" ); ?>
    
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <!-- post start -->
    <div class="posts">
    <?php
      while( have_posts() ){
        the_post();
    ?>
    <div class="post" <?php post_class(); ?>>
      <div class="container">

      <div class="row">
          <div class="col-md-12 overflow-hidden">
            <h2 class="post-title">
             <?php the_title(); ?>
            </h2>
            <p class="post-author"><strong><?php the_author(); ?></strong></p>
            <p class="post-date"><?php echo get_the_date(); ?></p>
            <p class="post-category"><?php the_category(); ?></p>
            <?php 
             echo get_the_tag_list("<ul><li>","</li><li>", "</li></ul>");
              ?>
              <?php 
              if( has_post_thumbnail() ){
                $thumbnail_url = get_the_post_thumbnail_url( null, 'large');
                // echo '<a href="' . $thumbnail_url . '" data-featherlight="image">';
                printf( '<a href="%s" data-featherlight="image">', $thumbnail_url );
               
                the_post_thumbnail( 'full' );
                echo '</a>';
              }
              
              the_content();

              next_post_link();
              echo "<br>";
              previous_post_link();

            ?>
          </div>
         <?php if( comments_open() ){  ?>
          <div class="col-md-12">
            <?php comments_template(); ?>
          </div>
          <?php } ?>
        </div>

      </div>
    </div>
    <?php  } ?>
    </div>
    <!-- post.end -->
        </div>
        <div class="col-md-4">
          <?php
            if( is_active_sidebar( 'sidebar-1' ) ){
              dynamic_sidebar( 'sidebar-1' );
            }
          ?>
        </div>
      </div>
    </div>


    <?php get_footer(); ?>
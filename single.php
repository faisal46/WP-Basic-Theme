<?php get_header(); ?>
  <body <?php body_class(); ?>>

  <?php get_template_part( '/template-parts/common/hero' ); ?>
    
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <!-- post start -->
    <div class="posts">
    <?php
      while( have_posts() ){
        the_post();
    ?>
    <div <?php post_class(); ?>>
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
                // $thumbnail_url = get_the_post_thumbnail_url( null, 'large');
                // echo '<a href="' . $thumbnail_url . '" data-featherlight="image">';
                // printf( '<a href="%s" data-featherlight="image">', $thumbnail_url );
                echo '<a class="popup" href="#" data-featherlight="image">';
               
                the_post_thumbnail( 'full' );
                echo '</a>';
              }
              
              the_content();

              wp_link_pages();

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

        <!-- Author section start -->
         <div class="author-section p-3 my-5">
          <div class="row">
          <div class="col-md-2">
          <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
          </div>
          <div class="col-md-10">
            <h3><?php echo get_the_author_meta( 'display_name' ); ?></h3>
            <p><?php echo get_the_author_meta( 'description' ); ?></p>
          </div>
          </div>
         </div>
        <!-- Author section.end -->

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
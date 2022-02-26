<?php get_header(); ?>
  <body <?php body_class(); ?>>

 <?php get_template_part( "/template-parts/common/hero" ); ?>
    
    <!-- 404 error start -->
    <div class="page-not-found">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
              <h1>404</h1>
              <h2>Page Not Found !!!</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- 404 error.end -->

   <?php get_footer(); ?>
<!-- header start -->
 <div class="header page-header">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <p><?php bloginfo( 'description' ); ?></p>
            <h1><a href="<?php echo site_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <hr>
          </div>
        </div>
      </div>
    </div>
    <!-- header.end -->

    <!-- Template menu start -->
    <div class="container">
      <div class="row">
      <div class="col-md-12 mb-5">
            <div class="navigation">
              <?php 
                wp_nav_menu(
                  array( 
                    'theme_location' => 'topmenu',
                    'menu_id' => 'topmenucontainer',
                    'menu_class' => 'list-inline text-center',
                   )
                );
              ?>
            </div>
          </div>
      </div>
    </div>
    <!-- Template menu.end -->
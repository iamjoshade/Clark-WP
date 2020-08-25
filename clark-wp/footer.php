<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package clark
 */

?>
	<footer class="ftco-footer ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
              <?php if( is_active_sidebar( 'sidebar-footer1' ) ): ?>
               <?php dynamic_sidebar( 'sidebar-footer1' ); ?>
          </div>
          <div class="col-md">
           <?php dynamic_sidebar( 'sidebar-footer2' ); ?>
          </div>
          <div class="col-md">
              <?php dynamic_sidebar( 'sidebar-footer3' ); ?>
          </div>
          <div class="col-md">
              <?php dynamic_sidebar( 'sidebar-footer4' ); ?>
          </div>
        </div>
         <?php endif; ?>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright  <?php echo get_theme_mod('set_copyright', 'Copyright Year Goes Here e.g 2020');?> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> and themeby <a href="https://www.95media.co.uk" target="_blank" rel="no-follow">95media</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  
<!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
 

<?php wp_footer(); ?>

</body>
</html>

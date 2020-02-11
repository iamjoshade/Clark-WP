<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package clark
 */

get_header();
?>

<?php $blog_page = get_option('page_for_posts');
$image = get_post_thumbnail_id($blog_page);
$image = wp_get_attachment_image_src($image, 'full');
?>

	 <section class="hero-wrap js-fullheight" style="background-image: url(
			'<?php echo $image[0] ?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
          <div class="col-md-12 ftco-animate pb-5 mb-3 text-center">

          	<?php
		if ( is_singular() ) :
			the_title( '<h1 class="mb-3 bread">', '</h1>' );
		else :
			the_title( '<h2 class="mb-3 bread"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
            ?>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?php the_permalink();?>"> <?php custom_breadcrumbs(); ?> </a></span> </p>
          </div>
        </div>
      </div>
    </section>



<section class="ftco-section">
      <div class="container">
        <div class="row">
        	<?php
		while ( have_posts() ) :
			the_post(); ?>

          <div class="col-lg-8 ftco-animate">
            <h2 class="mb-3"><?php the_title();?></h2>

            <?php 
		if( has_post_thumbnail() ):
			the_post_thumbnail( 'clark-wp-blog', array( 'class' => 'img-fluid' ) );
		endif;?>
            <div class="blog-content mt-4">
            <?php the_content();?>
        </div>
            
            <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">
                <?php the_tags( '', '' ); ?>
              </div>
            </div>

             <div class="next_post mb-4"><?php the_post_navigation(); ?></div>

            <div class="clearfix"></div>
           
           <?php if ( is_singular( 'post' ) ) :?>

            <div class="about-author d-flex p-4 bg-dark">
              <div class="bio mr-5">
                <?php echo get_avatar( get_the_author_meta( 'ID'), 50 ); ?>			
              </div>
              <div class="desc">
                <h3><?php the_author_posts_link(); ?></h3>
                <p><?php the_author_meta('description') ?></p>
              </div>
            </div>

           <?php endif;?>


            <div class="pt-5 mt-5">
             <?php 

             	//If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
             ?>
            </div>

          </div> <!-- .col-md-8 -->
        <?php endwhile; // End of the loop.?>
             <?php get_sidebar();?>
        </div>
      </div>
    </section> <!-- .section -->
		



<?php get_footer();?>

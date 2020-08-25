<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

          	<h2 class="mb-3"> <?php wp_title();?></h2>
            
          </div>
        </div>
      </div>
    </section>

	<section class="ftco-section">
      <div class="container">
        <div class="row">

		<?php if ( have_posts() ) : ?>


 		<div class="col-lg-8 ftco-animate">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() ); ?>


			<?php endwhile; the_posts_navigation();?>

				<?php the_post_navigation();?>

			<?php endif?>

		</div>

	<?php get_sidebar();?>

	</div>
</div>
</section>
<?php get_footer(); ?>
